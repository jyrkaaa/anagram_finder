<?php

namespace App\Service\Import;

class StartWordImportMessage
{
    public function __construct(
        public readonly string $url,
        public readonly string $format = 'text'
    )
    {
    }
}
