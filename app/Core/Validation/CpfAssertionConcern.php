<?php

namespace Core\Validation;

use Core\Utilities\CpfVerify;

class CpfAssertionConcern
{
    public static function assertIsValid(string $cpf)
    {
        AssertionConcern::assertArgumentNotEmpty($cpf, 'O CPF não pode ser vazio.');
        self::verify($cpf, 'Este CPF é inválido.');
    }

    private static function verify(string $cpf, string $message)
    {
        if (!CpfVerify::isValid($cpf)) {
            throw new \InvalidArgumentException($message);
        }
    }
}
