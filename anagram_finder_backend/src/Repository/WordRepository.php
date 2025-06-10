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

    public function findAnagrams(string $word) : array
    {
        $sorted = SortString::sort($word);
        $results = $this->createQueryBuilder('w')
            ->select('w.name')
            ->where('w.sorted_key = :sorted')
            ->setParameter('sorted', $sorted);

        return array_column($results->getQuery()->getArrayResult(), 'name');
    }
    public function findCountOfAll() : int
    {
        $results = $this->createQueryBuilder('w')->select('COUNT(w.id)')->getQuery()->getSingleScalarResult();

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
