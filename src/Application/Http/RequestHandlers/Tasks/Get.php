<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Narration\Framework\Http\Message\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

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

        return Response::json($this->taskRepository->find($id));
    }
}
