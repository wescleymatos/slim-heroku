<?php

namespace Cruds\Domain\Entities;

use Cruds\Domain\Entities\Entity;
use Core\Validation\AssertionConcern;
use Core\ValueObject\Phone;
use Core\ValueObject\Email;
use Core\ValueObject\Address;

class Customer extends Entity
{
    private $name;
    private $email;
    private $phone;
    private $address;

    public function __construct(string $name, Email $email, Phone $phone, Address $address)
    {
        AssertionConcern::assertArgumentNotEmpty($name, 'Nome inválido');
        AssertionConcern::assertArgumentNotNull($email, 'Email inválido');
        AssertionConcern::assertArgumentNotNull($phone, 'Telefone inválido');
        AssertionConcern::assertArgumentNotNull($address, 'Endereço inválido');

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function setPhone(Phone $phone)
    {
        $this->phone = $phone;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }
}
