<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Domain\Entities\Task;

final class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    /**
     * TaskRepository constructor.
     *
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $id): Task
    {
        /** @var \Domain\Entities\Task $task */
        $task = $this->entityManager->find(Task::class, $id);

        return $task;
    }
}
