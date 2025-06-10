<?php

namespace App\Repository;

use App\Entity\Word;
use App\Methods\SortString;
use App\Service\Import\WordImporter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Word>
 */
class WordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Word::class);
    }

    public function importFromUrl(string $url, string $format = 'text'): int
    {
        $lines = @file($url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            throw new \RuntimeException("Failed to download or parse file from URL");
        }

        $words = [];

        switch ($format) {
            case 'text':
                // raw format: one word per line, or ID + word
                foreach ($lines as $line) {
                    $line = trim($line);
                    // Skip numeric-only lines (like "1", "2", etc.)
                    if (ctype_digit($line)) continue;

                    // Skip very short strings
                    if (mb_strlen($line) < 2) continue;

                    $words[] = $line;
                }
                break;

            case 'csv':
                foreach ($lines as $line) {
                    $fields = str_getcsv($line);
                    foreach ($fields as $field) {
                        $word = trim($field);
                        if (mb_strlen($word) > 1) {
                            $words[] = $word;
                        }
                    }
                }
                break;

            case 'json':
                $json = file_get_contents($url);
                $items = json_decode($json, true);
                if (!is_array($items)) {
                    throw new \RuntimeException("Invalid JSON structure");
                }
                foreach ($items as $word) {
                    if (is_string($word) && mb_strlen($word) > 1) {
                        $words[] = trim($word);
                    }
                }
                break;

            default:
                throw new \InvalidArgumentException("Unsupported format: $format");
        }

        $em = $this->getEntityManager();
        foreach ($words as $word) {
            $em->persist(new Word($word));
        }
        $em->flush();

        return count($words);
    }

    public function findAnagrams(string $word) : array
    {
        $sorted = SortString::sort($word);
        $results = $this->findBy(['sorted_key' => $sorted]);

        return array_map(fn($w) => $w->getName(), $results);
    }
    public function findCountOfAll() : int
    {
        $results = $this->createQueryBuilder('w')->select('COUNT(w)')->getQuery()->getSingleScalarResult();

        return $results;
    }

    public function importFromJson(array $array, WordImporter $importer): int
    {
       return  $importer->importWordsArray($array);
    }
    public function deleteAll(): int {
        return $this->getEntityManager()
        ->createQueryBuilder('w')->delete(Word::class, 'w')
        ->getQuery()
        ->execute();
    }

}
