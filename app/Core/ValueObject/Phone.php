<?php

namespace Core\ValueObject;

class Phone
{
    private $ddd;
    private $number;

    public function __construct(int $ddd, string $number)
    {
        if ($ddd < 11 || $ddd > 99) {
            throw new \InvalidArgumentException("O ddd está inválido");
        }

        if (empty($number)) {
            throw new \InvalidArgumentException("O número é obrigatório");
        }

        if (strlen($number) == 0 || strlen($number) > 9) {
            throw new \InvalidArgumentException("O número do telefone está inválido");
        }

        $this->ddd = $ddd;
        $this->number = $number;
    }

    public function getDdd(): string
    {
        return $this->ddd;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
