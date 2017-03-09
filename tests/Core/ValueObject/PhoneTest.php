<?php

namespace Core\ValueObject;

use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    private $phone;
    const DDD = 84;
    const NUMBER = '987069818';

    public function setUp()
    {
        $this->phone = new Phone(self::DDD, self::NUMBER);
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
        new Phone();
    }

    public function testThrowExceptionWhenInstancePassInvalidDDD()
    {
        $this->setExpectedException('InvalidArgumentException', 'O ddd está inválido');
        new Phone(1, self::NUMBER);
    }

    public function testThrowExceptionWhenInstanceRequiredNumber()
    {
        $this->setExpectedException('InvalidArgumentException', 'O número é obrigatório');
        new Phone(self::DDD, '');
    }

    public function testThrowExceptionWhenInstancePassInvalidNumber()
    {
        $this->setExpectedException('InvalidArgumentException', 'O número do telefone está inválido');
        new Phone(self::DDD, '1234567890234');
    }

    public function testGetDdd()
    {
        $return = $this->phone->getDdd();
        $this->assertEquals(self::DDD, $return);
    }

    public function testGetNumber()
    {
        $return = $this->phone->getNumber();
        $this->assertEquals(self::NUMBER, $return);
    }
}
