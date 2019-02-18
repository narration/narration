<?php

declare(strict_types=1);

namespace Application\Console\Commands;

use Domain\Contracts\Repositories\TaskRepositoryInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class FooCommand
{
    /**
     * @return void
     */
    public function __invoke(InputInterface $input, OutputInterface $output): void
    {
        // ...
    }
}
