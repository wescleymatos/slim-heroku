<?php

use SaleProducts\Domain\Contracts\Repositories\ProductRepositoryInterface;
use SaleProducts\Infra\Repositories\ProductRepository;
use Cruds\Domain\Contracts\Repositories\CustomerRepositoryInterface;
use Cruds\Infra\Repositories\CustomerRepository;

return [
    ProductRepositoryInterface::class => DI\object(ProductRepository::class),
    CustomerRepositoryInterface::class => DI\object(CustomerRepository::class)
];
