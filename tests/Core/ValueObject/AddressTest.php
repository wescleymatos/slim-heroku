<?php

namespace Core\ValueObject;

use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    private $address;
    const NEIGHBORHOOD = 'Neópolis';
    const CITY = 'Natal';
    const STATE = 'RN';
    const ZIPCODE = 59080100;
    const PUBLICPLACE = 'Av. Ayrton Senna, 3081';

    public function setUp()
    {
        $this->address = new Address(self::NEIGHBORHOOD, self::CITY, self::STATE, self::PUBLICPLACE, self::ZIPCODE);
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
        new Address();
    }

    public function testGetNeighborhood()
    {
        $return = $this->address->getNeighborhood();
        $this->assertEquals(self::NEIGHBORHOOD, $return);
    }

    public function testGetPublicPlace()
    {
        $return = $this->address->getPublicPlace();
        $this->assertEquals(self::PUBLICPLACE, $return);
    }

    public function testGetCity()
    {
        $return = $this->address->getCity();
        $this->assertEquals(self::CITY, $return);
    }

    public function testGetState()
    {
        $return = $this->address->getState();
        $this->assertEquals(self::STATE, $return);
    }

    public function testGetZipCode()
    {
        $return = $this->address->getZipCode();
        $this->assertEquals(self::ZIPCODE, $return);
    }
}
