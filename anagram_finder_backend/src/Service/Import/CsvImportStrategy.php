<?php
namespace App\Service\Import;

class CsvImportStrategy implements WordImportStrategyInterface
{
    public function supports(string $format): bool
    {
        return $format === 'csv';
    }

    /**
     * Stream and yield words from a CSV file line by line.
     */
    public function parse(string $url): \Generator
    {
        $handle = @fopen($url, 'r');

        if (!$handle) {
            throw new \RuntimeException("Failed to open CSV file: $url");
        }

        while (($line = fgets($handle)) !== false) {
            $columns = str_getcsv($line);
            foreach ($columns as $word) {
                $word = trim($word);
                if (mb_strlen($word) > 1) {
                    yield $word;
                }
            }
        }

        fclose($handle);
    }
}
