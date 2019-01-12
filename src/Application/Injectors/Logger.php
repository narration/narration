<?php

declare(strict_types=1);

namespace Application\Injectors;

final class Logger
{
    /**
     * Injects the logger into the container.
     *
     * @param \Application\Container
     */
    public function __invoke(Container $container): void
    {
        // $container->inject(Psr\Log\LoggerInterface::class, \Infrastructure\Logger::class)
    }
}
