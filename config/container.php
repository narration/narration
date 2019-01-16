<?php declare(strict_types=1);

$container = new \League\Container\Container();

$container->delegate(
    new \League\Container\ReflectionContainer
);

// @todo refacto...
$definitions = [];
$definitions = (new \Application\Injectors\Database())($container, $definitions);
foreach ($definitions as $key => $definition) {
    $container->add($key, $definition);
}

$definitions = (new \Application\Injectors\Repositories())($container, $definitions);
foreach ($definitions as $key => $definition) {
    $container->add($key, $definition);
}

return $container;
