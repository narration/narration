<?php

declare(strict_types=1);

namespace Application\Injectors;

final class Logger
{
    /**
     * Injects the logger into the container definitions.
     *
     * @param array $definitions
     *
     * @return array
     */
    public function __invoke(array $definitions): array
    {
        // $definitions[\Psr\Log\LoggerInterface::class] = \Infrastructure\Logger::class;

        return $definitions;
    }
}
