<?php

declare(strict_types=1);

namespace Application\Injectors;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

final class EntityManager
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
     * Injects the entity manager into the container definitions.
     *
     * @param array $definitions
     *
     * @return array
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function __invoke(array $definitions): array
    {
        $configuration = Setup::createAnnotationMetadataConfiguration($this->paths, true);

        $entityManager = \Doctrine\ORM\EntityManager::create($this->connection, $configuration);

        $definitions[EntityManagerInterface::class] = $entityManager;

        return $definitions;
    }
}
