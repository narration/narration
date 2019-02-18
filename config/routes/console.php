<?php declare(strict_types=1);

$router = new \Narration\Console\Router(require __DIR__.'/../container.php');

/**
 * The Console component allows you to create command-line commands. Your console commands
 * can be used for any recurring task, such as cronjobs, imports, or other batch jobs.
 */
$router->command('foo', \Application\Console\Commands\FooCommand::class);

return $router;
