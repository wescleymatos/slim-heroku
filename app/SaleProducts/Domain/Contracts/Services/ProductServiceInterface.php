<?php

namespace SaleProducts\Domain\Contracts\Services;

interface ProductServiceInterface
{
    public function add(string $name): string;
}
