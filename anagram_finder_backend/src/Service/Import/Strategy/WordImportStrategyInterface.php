<?php
namespace App\Service\Import\Strategy;

interface WordImportStrategyInterface
{
    public function supports(string $format): bool;

    /**
     * @return \Generator List of parsed words
     */
    public function parse(string $url): \Generator;
}
