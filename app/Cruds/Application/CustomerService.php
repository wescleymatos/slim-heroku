<?php

namespace Cruds\Application;

use Cruds\Domain\Contracts\Services\CustomerServiceInterface;
use Cruds\Domain\Contracts\Repositories\CustomerRepositoryInterface;
use Core\ValueObject\Email;
use Core\ValueObject\Phone;
use Core\ValueObject\Address;
use Cruds\Domain\Entities\Customer;

class CustomerService implements CustomerServiceInterface
{
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

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
    ): string {
        $email = new Email($email);
        $phone = new Phone($ddd, $phone);
        $address = new Address($neighborhood, $city, $state, $publicPlace, $zipCode);
        $customer = new Customer($name, $email, $phone, $address);

        return $this->repository->create($customer);
    }

    public function get(string $id): Customer
    {
        if (empty($id)) {
            \InvalidArgumentException('O id nao pode ser vazio.');
        }

        return $this->repository->get($id);
    }
}
