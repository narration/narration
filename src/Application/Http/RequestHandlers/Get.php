<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

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
        $contents = (string) file_get_contents(__DIR__.'/../../../Presentation/index.html');

        return new HtmlResponse($contents);
    }
}
