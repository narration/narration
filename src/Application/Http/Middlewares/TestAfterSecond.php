<?php

namespace Application\Http\Middlewares;


use Narration\Http\Contracts\AfterRequestHandlingInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TestAfterSecond implements AfterRequestHandlingInterface, MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
          echo '<pre>';
            var_dump('after!');
            die();
        return $handler->handle($request);
    }

}