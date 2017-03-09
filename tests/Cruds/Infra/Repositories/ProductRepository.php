<?php

namespace SaleProducts\Infra\Repositories;

use SaleProducts\Domain\Contracts\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
    }

    public function create(string $name): string
    {
        return 'Salvei: ' . $name;
    }
}
