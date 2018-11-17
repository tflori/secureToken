<?php

namespace SecureToken\Tests;

use PHPUnit\Framework\TestCase;
use SecureToken\Token;

/**
 * Class TokenTest
 *
 * @package SecureToken\Tests
 * @author Thomas Flori <thflori@gmail.com>
 */
class TokenTest extends TestCase
{
    /** @test */
    public function returnsString()
    {
        $token = Token::generate();

        $this->assertTrue(is_string($token));
    }

    /** @test */
    public function tokenIsNotEmpty()
    {
        $token = Token::generate();

        $this->assertNotEmpty($token);
    }

    /** @test */
    public function containsNumbersAndLowercaseAndUppercaseLetters()
    {
        $token = Token::generate();

        $this->assertRegExp('/[0-9]/', $token);
        $this->assertRegExp('/[a-z]/', $token);
        $this->assertRegExp('/[A-Z]/', $token);
    }

    /** @test */
    public function notContainOtherCharacters()
    {
        $token = Token::generate();

        $this->assertRegExp('/^[a-zA-Z0-9]+$/', $token);
    }

    /** @test */
    public function isAlwaysDifferent()
    {
        $token1 = Token::generate();
        $token2 = Token::generate();
        $token3 = Token::generate();

        $this->assertNotEquals($token1, $token2);
        $this->assertNotEquals($token2, $token3);
        $this->assertNotEquals($token1, $token3);
    }

    /** @test */
    public function returnsHex()
    {
        $token = Token::generate(128, 16);

        $this->assertRegExp('/^[0-9a-f]{32}$/', $token);
    }

    /** @test */
    public function generatesMoreRandomStrings()
    {
        $token = Token::generate(256, 16);

        $this->assertRegExp('/^[0-9a-f]{64}$/', $token);
    }

    /** @test */
    public function isOnlyPreciseToByte()
    {
        $token1 = Token::generate(135, 16);
        $token2 = Token::generate(136, 16);

        $this->assertRegExp('/^[0-9a-f]{32}$/', $token1);
        $this->assertRegExp('/^[0-9a-f]{34}$/', $token2);
    }

    /** @test */
    public function convertsToBase64()
    {
        $token = Token::generate(96, 64);

        $this->assertRegExp('/^[0-9a-zA-Z+\/]{15,16}$/', $token);
    }

    /** @test */
    public function acceptsMaxBase64AndFallsBackTo62()
    {
        $token = Token::generate(96, 128);

        $this->assertRegExp('/^[0-9a-zA-Z]{15,17}$/', $token);
    }

    /** @test */
    public function getsDecimalInteger()
    {
        $token = Token::generate(56, 10);

        $this->assertEquals($token, (int)$token);
    }
}
