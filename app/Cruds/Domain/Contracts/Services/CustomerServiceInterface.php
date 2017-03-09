<?php

namespace Cruds\Domain\Contracts\Services;

use Cruds\Domain\Entities\Customer;

interface CustomerServiceInterface
{
    public function add(
        string $name,
        string $email,
        int $ddd,
        string $phone,
        int $zipCode,
        string $neighborhood,
        string $city,
        string $state,
        string $publicPlace
    ): string;

    public function get(string $id): Customer;
}
