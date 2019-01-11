<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Narration\Http\Message\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Get implements RequestHandlerInterface
{
    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Perform an action

        return Response::json([
            'fresh' => 'start'
        ]);
    }
}
