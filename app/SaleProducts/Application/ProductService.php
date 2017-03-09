<?php

namespace SaleProducts\Application;

use SaleProducts\Domain\Contracts\Services\ProductServiceInterface;
use SaleProducts\Domain\Contracts\Repositories\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function add(string $name): string
    {
        return $this->repository->create($name);
    }
}
