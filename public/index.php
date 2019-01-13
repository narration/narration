<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();

$kernel = Narration\Framework\Http\Kernel::create(__DIR__.'/../composer.json');

$response = $kernel->handle($request);

(new \Zend\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
