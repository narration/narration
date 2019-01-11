<?php

declare(strict_types=1);

namespace Application\Http\RequestHandlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class Get implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new \Zend\Diactoros\Response\JsonResponse(['nuno' => 'nuno']);

        return $response;
    }
}
