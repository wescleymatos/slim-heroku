<?php

namespace Cruds\Domain\Entities;

use PHPUnit\Framework\TestCase;
use Core\ValueObject\Phone;
use Core\ValueObject\Email;
use Core\ValueObject\Address;

class CustomerTest extends TestCase
{
    private $customer;
    private $phone;
    private $email;
    private $address;
    const NEIGHBORHOOD = 'Neópolis';
    const CITY = 'Natal';
    const STATE = 'RN';
    const ZIPCODE = 59080100;
    const PUBLICPLACE = 'Av. Ayrton Senna, 3081';

    public function setUp()
    {
        $this->phone = new Phone(84, '987069818');
        $this->email = new Email('teste@teste.com');
        $this->address = new Address(self::NEIGHBORHOOD, self::CITY, self::STATE, self::PUBLICPLACE, self::ZIPCODE);
        $this->customer = new Customer('wescley matos', $this->email, $this->phone, $this->address);
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
        new Customer();
    }

    public function testGetIdAfterSet()
    {
        $this->customer->setId(12);
        $return = $this->customer->getId();
        $this->assertEquals(12, $return);
    }

    public function testSetIdWrongTypeHintParam()
    {
        $this->setExpectedException('TypeError');
        $this->customer->setId('abc');
    }

    public function testGetNameToConstructGiven()
    {
        $return = $this->customer->getName();
        $this->assertEquals('wescley matos', $return);
    }

    public function testThrowErrorForSetName()
    {
        $this->setExpectedException('Error');

        $this->customer->setName('antonio matos');
    }

    public function testThrowErrorForSetEmail()
    {
        $this->setExpectedException('TypeError');
        $this->customer->setEmail('teste@teste.com');
    }

    public function testGetEmailAfterSet()
    {
        $this->customer->setEmail($this->email);
        $return = $this->customer->getEmail()->getAddress();
        $this->assertEquals('teste@teste.com', $return);
    }

    public function testGetPhoneDddAfterSet()
    {
        $this->customer->setPhone($this->phone);
        $ddd = $this->customer->getPhone()->getDdd();
        $number = $this->customer->getPhone()->getNumber();
        $this->assertEquals(84, $ddd);
        $this->assertEquals('987069818', $number);
    }
}
