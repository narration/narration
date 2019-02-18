<?php

declare(strict_types=1);

namespace Application\Http\Middleware;

use function is_string;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class TrimStrings implements MiddlewareInterface
{
    /**
     * Filters the given request before or after sending it to the handler.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @param  \Psr\Http\Server\RequestHandlerInterface $handler
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        foreach ($request->getAttributes() as $name => $value) {
            if (is_string($value)) {
                $request = $request->withAttribute($name, trim($value));
            }
        }

        return $handler->handle($request);
    }
}
