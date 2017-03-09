<?php

namespace Core\ValueObject;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    private $email;

    public function setUp()
    {
        $this->email = new Email('teste@teste.com');
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
        new Email();
    }

    public function testThrowExceptionWhenInstancePassInvalidEmail()
    {
        $this->setExpectedException('InvalidArgumentException', 'Endereço de email inválido');
        new Email('teste@teste');
    }

    public function testGetEmail()
    {
        $return = $this->email->getAddress();
        $this->assertEquals('teste@teste.com', $return);
    }
}
