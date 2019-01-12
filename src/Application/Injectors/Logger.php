<?php

declare(strict_types=1);

namespace Application\Injectors;

use Psr\Container\ContainerInterface;

final class Logger
{
    /**
     * Injects the logger service into the container.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __invoke(ContainerInterface $container): void
    {
        // ...
    }
}
