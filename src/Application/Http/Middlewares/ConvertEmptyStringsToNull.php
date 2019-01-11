<?php

namespace Application\Http\Middlewares;


use Narration\Http\Contracts\BeforeRequestHandlingInterface;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ConvertEmptyStringsToNull implements MiddlewareInterface, BeforeRequestHandlingInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        foreach ($request->getAttributes() as $key => $value) {
            $request->withAttribute($key, ($value === '') ? null : $value);
        }

        return $handler->handle($request);
    }

}