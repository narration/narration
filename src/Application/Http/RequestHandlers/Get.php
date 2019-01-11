<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Application\Http\Middlewares\ConvertEmptyStringsToNull;
use Application\Http\Middlewares\TestAfter;
use Application\Http\Middlewares\TestAfterSecond;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Get implements RequestHandlerInterface
{
    public $middleware = [
        ConvertEmptyStringsToNull::class,
    ];


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new \Zend\Diactoros\Response\JsonResponse(['nuno' => 'nuno']);

        return $response;
    }
}
