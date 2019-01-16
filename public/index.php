<?php declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Capture the request from globals.
 */
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals();

/**
 * Creates an new instance of the router and set the routes on the routes file.
 */
$router = require __DIR__ . '/../config/routes/http.php';

/**
 * Dispatch the response.
 */
$response = $router->dispatch($request);

/**
 * Emits the response to the browser.
 */
(new \Zend\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
