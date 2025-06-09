<?php
// src/Service/Import/TextImportStrategy.php
namespace App\Service\Import;

class TextImportStrategy implements WordImportStrategyInterface
{
    public function supports(string $format): bool
    {
        return $format === 'text';
    }

    public function parse(string $url): \Generator
    {
        $handle = @fopen($url, 'r');

        if (!$handle) {
            throw new \RuntimeException("Failed to open file: $url");
        }

        while (!feof($handle)) {
            $line = trim(fgets($handle));
            if ($line === '' || ctype_digit($line) || mb_strlen($line) < 2) {
                continue;
            }
            yield $line;
        }

        fclose($handle);
    }
}
