<?php

declare(strict_types=1);

namespace Application\Injectors;

use Doctrine\ORM\EntityManagerInterface;
use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Infrastructure\Persistence\Repositories\TaskRepository;
use Psr\Container\ContainerInterface;

final class Repositories
{
    /**
     * Injects repositories into the container definitions.
     *
     * @param  \Psr\Container\ContainerInterface $container
     * @param  mixed[] $definitions
     *
     * @return mixed[]
     */
    public function __invoke(ContainerInterface $container, array $definitions): array
    {
        $entityManager = $container->get(EntityManagerInterface::class);

        $definitions[TaskRepositoryInterface::class] = new TaskRepository($entityManager);

        return $definitions;
    }
}
