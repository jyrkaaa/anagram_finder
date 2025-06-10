<?php

namespace App\Service\Import;

use App\Service\Import\SaveWordsToDatabaseMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class StartWordImportHandler
{
    public function __construct(
        private iterable            $strategies,
        private MessageBusInterface $bus
    )
    {
    }

    /**
     * @throws ExceptionInterface
     */
    public function __invoke(StartWordImportMessage $message): void
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($message->format)) {
                $stream = $strategy->parse($message->url);
                foreach ($stream as $word) {
                    if (is_string($word) && trim($word) !== '') {
                        file_put_contents('/tmp/word_import.txt', $word . PHP_EOL, FILE_APPEND);
                    }
                }

                break;
            }
        }

        $this->bus->dispatch(new SaveWordsToDatabaseMessage());
    }
}
