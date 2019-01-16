<?php declare(strict_types=1);

$strategy = new \League\Route\Strategy\ApplicationStrategy();
$router = (new League\Route\Router())->setStrategy($strategy->setContainer(require __DIR__ . '/../container.php'));

/**
 * The middleware.
 */
$router->middleware(new Application\Http\Middleware\TrimStrings());

/**
 * The Request Handlers.
 */
$router->get('/', new Application\Http\RequestHandlers\Index());

return $router;
