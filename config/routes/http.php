<?php declare(strict_types=1);

$router = new \Narration\Router\Router(require __DIR__.'/../container.php');

/**
 * HTTP middleware is a way to move common request and
 * response processing away from the application layer.
 */
$router->middleware(new Application\Http\Middleware\TrimStrings());

/**
 * HTTP request handlers are a fundamental part of any web application. Server-side
 * code receives a request message, processes it, and produces a response message.
 */
$router->get('/', Application\Http\RequestHandlers\Index::class);

return $router;
