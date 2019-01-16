<?php declare(strict_types=1);

$container = new \League\Container\Container();

return $container->delegate(
    new \League\Container\ReflectionContainer
);
