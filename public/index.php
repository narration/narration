<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

$request = Narration\Framework\Http\Message\Request::capture();

$kernel = Narration\Framework\Http\Kernel::create(__DIR__.'/../composer.json');

$response = $kernel->handle($request);

Narration\Framework\Http\Message\Emitter::make()->emit($response);
