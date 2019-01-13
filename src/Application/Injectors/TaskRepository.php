<?php

declare(strict_types=1);

namespace Application\Injectors;

use Domain\Contracts\Repositories\TaskRepositoryInterface;

final class TaskRepository
{
    /**
     * Injects the Task Repository into the container definitions.
     *
     * @param array $definitions
     *
     * @return array
     */
    public function __invoke(array $definitions): array
    {
        $definitions[TaskRepositoryInterface::class] = \Infrastructure\Persistance\Repositories\TaskRepository::class;

        return $definitions;
    }
}
