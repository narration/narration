<?php

declare(strict_types=1);

namespace Domain\Entities;

/**
 * @Entity
 * @Table(name="products")
 **/
final class Task
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $description;
}
