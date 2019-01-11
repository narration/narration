<?php

require __DIR__.'/../vendor/autoload.php';

$request = Narration\Http\Message\Request::fromGlobals();

$kernel = Narration\Http\Kernel::fromPath('../src/Application/Http');

$response = $kernel->handle($request);

(new \Zend\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

$kernel->terminate($request, $response);
