<?php

require __DIR__.'/../vendor/autoload.php';

$request = Narration\Http\Message\Request::capture();

$kernel = Narration\Http\Kernel::fromPath(__DIR__.'/../src/Application/Http/RequestHandlers');

$response = $kernel->handle($request);

(new \Zend\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

$kernel->terminate($request, $response);
