<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers\Tasks;

use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

final class Get implements RequestHandlerInterface
{
    /**
     * @var \Domain\Contracts\Repositories\TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * Get constructor.
     *
     * @param \Domain\Contracts\Repositories\TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');

        return new JsonResponse($this->taskRepository->find($id)->toArray());
    }
}
