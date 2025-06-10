<?php
namespace App\Service\Import\Strategy;

class TextImportStrategy implements WordImportStrategyInterface
{
    public function supports(string $format): bool
    {
        return $format === 'text';
    }

    public function parse(string $url): \Generator
    {
        $handle = fopen($url, 'r');
        while (($line = fgets($handle)) !== false) {
            $word = trim($line);
            if (mb_strlen($word) > 1) {
                yield $word;
            }
        }
        fclose($handle);
    }
}
