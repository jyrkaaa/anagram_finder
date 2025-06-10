<?php
namespace App\Service\Import;

use App\Entity\Word;
use App\Service\Import\Strategy\WordImportStrategyInterface;
use Doctrine\ORM\EntityManagerInterface;

class WordImporter
{
    /**
     * @param WordImportStrategyInterface[] $strategies
     */
    public function __construct(
        private iterable $strategies,
        private EntityManagerInterface $em
    ) {}

    public function import(string $url, string $format): int
    {
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);

        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($format)) {
                return $this->importFromIterable(
                    $this->getWordStream($strategy, $url),
                    batchSize: 500
                );
            }
        }

        throw new \InvalidArgumentException("Unsupported format: $format");
    }

    public function importWordsArray(array $words): int
    {
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);

        return $this->importFromIterable($words, batchSize: 5000);
    }

    private function importFromIterable(iterable $words, int $batchSize): int
    {
        $importedCount = 0;
        $tempEntities = [];

        foreach ($words as $i => $word) {
            if (!is_string($word) || trim($word) === '') {
                continue;
            }

            $entity = new Word($word);
            $this->em->persist($entity);
            $tempEntities[] = $entity;
            $importedCount++;

            if (($i + 1) % $batchSize === 0) {
                $this->flushAndClear($tempEntities);
            }
        }

        // Final flush
        $this->flushAndClear($tempEntities);
        return $importedCount;
    }

    private function getWordStream(WordImportStrategyInterface $strategy, string $url): \Generator
    {
        yield from $strategy->parse($url);
    }

    private function flushAndClear(array &$entities): void
    {
        $this->em->flush();

        foreach ($entities as $entity) {
            $this->em->detach($entity);
        }

        $entities = [];
        gc_collect_cycles();
    }

}
