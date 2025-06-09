<?php

namespace App\Tests;

use App\Entity\Word;
use App\Methods\SortString;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AnagramServiceTest extends KernelTestCase
{
    public function testSortedKey(): void
    {
        $sortAlgorith = new SortString();
        $word1 = "kaar";
        $word2 = "kara";
        $word1 = $sortAlgorith->sort($word1);
        $word2 = $sortAlgorith->sort($word2);
        $this->assertEquals($word1 , $word2);
    }
    public function testWordEntityConstruct(): void
    {
        $sortAlgorith = new SortString();
        $word1 = "kaar";
        $word2 = "kara";
        $word1 = $sortAlgorith->sort($word1);
        $word2 = new Word($word2);
        $this->assertEquals($word1 , $word2->getSortedKey());
    }
}
