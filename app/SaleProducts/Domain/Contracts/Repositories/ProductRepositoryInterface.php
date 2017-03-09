<?php

namespace SaleProducts\Domain\Contracts\Repositories;

interface ProductRepositoryInterface
{
    public function create(string $name): string;
}
