<?php

namespace Core\Validation;

use PHPUnit\Framework\TestCase;

class PasswordAssertionConcernTest extends TestCase
{
    const HASH = '$2y$07$pPUqspLWNee49EDE1/jeMOqFKLqus2HDcGQ6qkOIW4KQPXaTUFC1u';

    public function testPassEncryptShouldNotBeEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'A senha não pode ser vazio.');
        PasswordAssertionConcern::encrypt('');
    }

    public function testPassVerifyShouldNotBeEmpty()
    {
        $this->setExpectedException('TypeError');
        PasswordAssertionConcern::verify('');
    }

    public function testPassEncryptResultHash()
    {
        $result = PasswordAssertionConcern::encrypt('1234');
        $this->assertEquals(strlen($result), strlen(self::HASH));
    }

    public function testPassVerify()
    {
        $result = PasswordAssertionConcern::verify('1234', self::HASH);
        $this->assertTrue($result);
    }
}
