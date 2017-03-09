<?php

namespace Core\Validation;

class PasswordAssertionConcern
{
    const MSG = 'A senha não pode ser vazio.';

    public static function encrypt(string $password): string
    {
        AssertionConcern::assertArgumentNotEmpty($password, self::MSG);

        $options = [
            'cost' => 7
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public static function verify(string $password, string $hash): bool
    {
        AssertionConcern::assertArgumentNotEmpty($password, self::MSG);

        return password_verify($password, $hash);
    }
}
