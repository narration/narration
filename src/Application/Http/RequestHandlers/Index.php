<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

final class Index
{
    /**
     * Handle the given request.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return array
     */
    public function __invoke(ServerRequestInterface $request): array
    {
        return [
            'quote' => 'Intellectuals solve problems, geniuses prevent them.'
        ];
    }
}
