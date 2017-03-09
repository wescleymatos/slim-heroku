<?php

namespace Core\Utilities;

use PHPUnit\Framework\TestCase;

class CpfVerifyTest extends TestCase
{
    const CPF = '24111339603';

    public function testCpfIsValid()
    {
        $result = CpfVerify::isValid(self::CPF);
        $this->assertTrue($result);
    }

    public function testCpfLess11Numbers()
    {
        $result = CpfVerify::isValid('241113');
        $this->assertFalse($result);
    }
}
