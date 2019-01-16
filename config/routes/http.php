<?php declare(strict_types=1);

$responseFactory = new Zend\Diactoros\ResponseFactory;
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router = (new League\Route\Router)->setStrategy($strategy->setContainer(require __DIR__ . '/../container.php'));

/**
 * The middleware.
 */
$router->middleware(new Application\Http\Middleware\TrimStrings());

/**
 * The Request Handlers.
 */
$router->get('/', new Application\Http\RequestHandlers\Index());

return $router;
