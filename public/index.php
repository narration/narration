<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

$request = Narration\Http\Message\Request::capture();

$kernel = Narration\Http\Kernel::fromPath(__DIR__.'/../src/Application/Http');

$response = $kernel->handle($request);

Narration\Http\Message\Emitter::make()->emit($response);
