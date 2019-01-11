<?php

namespace Application\Http\Middlewares;


use Narration\Http\Contracts\BeforeRequestHandlingInterface;
use Narration\Http\Contracts\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class ConvertEmptyStringsToNull implements Middleware, BeforeRequestHandlingInterface
{
    public function handle(ServerRequestInterface $request, callable $next) : ServerRequestInterface
    {
        foreach ($request->getAttributes() as $key => $value) {
            $request = $request->withAttribute($key, ($value === '') ? null : $value);
        }

        return $next($request);
    }
    
}
