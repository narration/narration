<?php declare(strict_types=1);

use Narration\Container\Container;

/**
 * Creates the application's container with
 * the definitions provided by the injectors.
 */
return Container::makeWithInjectors([
    Application\Injectors\Repositories::class,
]);
