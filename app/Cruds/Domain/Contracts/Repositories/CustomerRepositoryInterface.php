<?php

namespace Cruds\Domain\Contracts\Repositories;

use Cruds\Domain\Entities\Customer;

interface CustomerRepositoryInterface
{
    public function create(Customer $customer): string;
    public function get(string $id): Customer;
}
