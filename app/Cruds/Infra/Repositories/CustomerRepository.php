<?php

namespace Cruds\Infra\Repositories;

use Cruds\Domain\Contracts\Repositories\CustomerRepositoryInterface;
use Cruds\Domain\Entities\Customer;
use Core\ValueObject\Phone;
use Core\ValueObject\Email;
use Core\ValueObject\Address;
use Firebase\ServiceAccount;
use Firebase;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $database;
    const REF = 'customers';

    public function __construct()
    {
        $firebase = Firebase::fromDatabaseUriAndSecret(
            'https://mk-financial.firebaseio.com',
            'vNR2ProRzPq2FzBJaCICMObxLeNOxJfCKFnwqBiK'
        );

        $this->database = $firebase->getDatabase();
    }

    public function create(Customer $customer): string
    {
        $mapper = [
            'name' => $customer->getName(),
            'email' => $customer->getEmail()->getAddress(),
            'phones' => [
                [
                    'ddd' => $customer->getPhone()->getDdd(),
                    'phone' => $customer->getPhone()->getNumber()
                ]
            ],
            'address' => [
                'city' => $customer->getAddress()->getCity(),
                'state' => $customer->getAddress()->getState(),
                'neighborhood' => $customer->getAddress()->getNeighborhood(),
                'publicPlace' => $customer->getAddress()->getPublicPlace(),
                'zipCode' => $customer->getAddress()->getZipCode()
            ]
        ];

        $customerRef = $this->database->getReference(self::REF)->push($mapper);
        $customerKey = $customerRef->getKey();

        return $customerKey;
    }

    public function get(string $id): Customer
    {
        $customerRef = $this->database->getReference(self::REF . "/{$id}");
        $customer = $customerRef->getSnapshot()->getValue();

        $email = new Email($customer['email']);
        $phone = new Phone($customer['phones'][0]['ddd'], $customer['phones'][0]['phone']);
        $address = new Address(
            $customer['address']['neighborhood'],
            $customer['address']['city'],
            $customer['address']['state'],
            $customer['address']['publicPlace'],
            $customer['address']['zipCode']
        );

        return new Customer($customer['name'], $email, $phone, $address);
    }
}
