<?php

namespace Core\ValueObject;

use Core\Validation\AssertionConcern;

class Address
{
    private $neighborhood;
    private $city;
    private $state;
    private $publicPlace;
    private $zipCode;

    public function __construct(string $neighborhood, string $city, string $state, string $publicPlace, int $zipCode)
    {
        AssertionConcern::assertArgumentRange($zipCode, 19900000, 99999999, 'CEP inválido');
        AssertionConcern::assertArgumentNotEmpty($publicPlace, 'O logradouro é obrigatório');
        AssertionConcern::assertArgumentNotEmpty($neighborhood, 'O bairro é obrigatório');
        AssertionConcern::assertArgumentNotEmpty($city, 'A cidade é obrigatória');
        AssertionConcern::assertArgumentNotEmpty($state, 'O estado é obrigatório');

        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->publicPlace = $publicPlace;
        $this->zipCode = $zipCode;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getPublicPlace(): string
    {
        return $this->publicPlace;
    }

    public function getZipCode(): int
    {
        return $this->zipCode;
    }
}
