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
     *
     * @var int
     */
    private $id;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $description;

    /**
     * Converts the entity to array.
     *
     * @return mixed[]
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
        ];
    }
}
