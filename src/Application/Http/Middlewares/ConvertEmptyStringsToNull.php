<?php

namespace Application\Http\Middlewares;


use Narration\Http\Contracts\BeforeRequestHandlingInterface;
use Narration\Http\Contracts\Middleware;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ConvertEmptyStringsToNull implements Middleware, BeforeRequestHandlingInterface
{
    public function handle(ServerRequestInterface $request, callable $next) : ServerRequestInterface
    {
        foreach ($request->getAttributes() as $key => $value) {
            $request = $request->withAttribute($key, ($value === '') ? null : $value);
        }

        $request = $request->withAttribute('fpp', 'bar');

        return $next($request);
    }
    
}