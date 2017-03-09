<?php

namespace Cruds\Domain\Entities;

use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{
    private $entity;

    public function setUp()
    {
        $this->entity = new Entity();
    }

    public function testGetIdAfterSet()
    {
        $this->entity->setId(12);
        $return = $this->entity->getId();
        $this->assertEquals(12, $return);
    }
}
