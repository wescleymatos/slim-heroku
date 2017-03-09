<?php

namespace Core\ValueObject;

use Core\Validation\AssertionConcern;

class Email
{
    private $address;

    public function __construct(string $address)
    {
        AssertionConcern::assertArgumentIsAnEmailAddress($address, 'Endereço de email inválido');

        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
