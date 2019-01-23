<?php declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Narration\Http\Kernel;
use Narration\Http\Request;

/**
 * Creates an new instance of the router.
 */
$router = require __DIR__ . '/../config/routes/http.php';

/**
 * Capture the request from globals.
 */
$request = Request::capture();

/**
 * Dispatch the request using the router.
 */
Kernel::using($router)->dispatch($request);
