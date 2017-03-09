<?php

namespace Cruds\Domain\Entities;

class Entity
{
    private $id;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
