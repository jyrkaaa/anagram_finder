<?php
namespace App\Service\Import\Strategy;

class JsonImportStrategy implements WordImportStrategyInterface
{
    public function supports(string $format): bool
    {
        return $format === 'json';
    }

    /**
     * Parses a JSON file and yields words one by one.
     */
    public function parse(string $url): \Generator
    {
        $json = @file_get_contents($url);
        if ($json === false) {
            throw new \RuntimeException("Failed to fetch JSON from URL: $url");
        }

        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \RuntimeException("Invalid JSON structure");
        }

        foreach ($data as $word) {
            if (is_string($word)) {
                $word = trim($word);
                if (mb_strlen($word) > 1) {
                    yield $word;
                }
            }
        }
    }
}
