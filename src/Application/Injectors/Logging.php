<?php

declare(strict_types=1);

namespace Application\Injectors;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;
use Ramsey\Uuid\Uuid;

final class Logging
{
    /**
     * Injects logging into the container
     *
     * @return mixed[]
     *
     */
    public function __invoke(): array
    {
        $logger = new Logger('NARRATION');
        $logger->pushHandler(new RotatingFileHandler('storage/logs/narration.log', 7, Logger::DEBUG));
        $logger->pushProcessor(function ($record) {
            $record['extra']['request_id'] = Uuid::uuid4()->toString();

            return $record;
        });
        $logger->pushProcessor(new WebProcessor());
        $logger->pushProcessor(new MemoryPeakUsageProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());

        return [
            Logger::class => $logger
        ];
    }
}
