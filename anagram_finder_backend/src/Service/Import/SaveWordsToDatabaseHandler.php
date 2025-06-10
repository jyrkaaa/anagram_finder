<?php

namespace App\Service\Import;

use App\Entity\Word;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Import\SaveWordsToDatabaseMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SaveWordsToDatabaseHandler
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function __invoke(SaveWordsToDatabaseMessage $message): void
    {
        $handle = fopen('/tmp/word_import.txt', 'r');
        $batch = [];

        while (($line = fgets($handle)) !== false) {
            $word = trim($line);
            if ($word === '') continue;

            $entity = new Word($word);
            $this->em->persist($entity);
            $batch[] = $entity;

            if (count($batch) >= 500) {
                $this->flushAndClear($batch);
            }
        }

        fclose($handle);
        $this->flushAndClear($batch);
        unlink('/tmp/word_import.txt');
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
