<?php

declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use Domain\Entities\Task;

interface TaskRepositoryInterface
{
    /**
     * Find a user by its primary key.
     *
     * @param int $id
     *
     * @return \Domain\Entities\Task
     */
    public function find(int $id): Task;
}
