<?php

namespace Core\Validation;

use PHPUnit\Framework\TestCase;

class CpfAssertionConcernTest extends TestCase
{
    const CPF = '24111339603';

    public function testCpfIsValid()
    {
        CpfAssertionConcern::assertIsValid(self::CPF);
    }

    public function testCpfLess11Numbers()
    {
        $this->setExpectedException('InvalidArgumentException', 'Este CPF é inválido.');
        CpfAssertionConcern::assertIsValid('2411133960');
    }

    public function testCpfEqualsNumbersIsNotValid()
    {
        $this->setExpectedException('InvalidArgumentException', 'Este CPF é inválido.');
        CpfAssertionConcern::assertIsValid('11111111111');
    }

    public function testCpfIsNotValid()
    {
        $this->setExpectedException('InvalidArgumentException', 'Este CPF é inválido.');
        CpfAssertionConcern::assertIsValid('12345678910');
    }

    public function testCpfEmptyIsNotValid()
    {
        $this->setExpectedException('InvalidArgumentException', 'O CPF não pode ser vazio.');
        CpfAssertionConcern::assertIsValid('');
    }
}
