<?php

declare(strict_types=1);

namespace Application\Injectors;

use Domain\Contracts\Repositories\TaskRepositoryInterface;

final class Repositories
{
    /**
     * Injects repositories into the container definitions.
     *
     * @param array $definitions
     *
     * @return array
     */
    public function __invoke(array $definitions): array
    {
        $definitions[TaskRepositoryInterface::class] = \Infrastructure\Persistence\Repositories\TaskRepository::class;

        return $definitions;
    }
}
