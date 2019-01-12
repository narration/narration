<?php

declare(strict_types=1);

namespace Application;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

final class Container implements ContainerInterface
{
    /**
     * Register a binding with the container.
     *
     * @param  string $abstract
     * @param  mixed $concrete
     *
     * @return void
     */
    public function bind(string $abstract, $concrete): void
    {
        // ..
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        // ..
    }

    /**
     * {@inheritdoc}
     */
    public function has($id)
    {
        // ..
    }
}
