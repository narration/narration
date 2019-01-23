<?php

declare(strict_types=1);

namespace Application\Injectors;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;

final class Database
{
    /**
     * The entities paths.
     *
     * @var array
     */
    private $paths = [
        __DIR__.'/../Domain/Entities',
    ];

    /**
     * The database connection.
     *
     * @var array
     */
    private $connection = [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__.'/../../database/database.sqlite',
    ];

    /**
     * Injects the database configuration into the container definitions.
     *
     * @return mixed[]
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function __invoke(): array
    {
        $configuration = Setup::createAnnotationMetadataConfiguration($this->paths, true);

        $entityManager = \Doctrine\ORM\EntityManager::create($this->connection, $configuration);

        return [
            EntityManagerInterface::class => $entityManager
        ];
    }
}
