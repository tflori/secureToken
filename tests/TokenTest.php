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
class TokenTest extends TestCase  {
    public function testGenerateToken_returnsString() {
        $token = Token::generate();

        $this->assertTrue(is_string($token));
    }

    public function testGenerateToken_tokenIsNotEmpty() {
        $token = Token::generate();

        $this->assertNotEmpty($token);
    }

    public function testGenerateToken_containsNumbersAndLowercaseAndUppercaseLetters() {
        $token = Token::generate();

        $this->assertRegExp('/[0-9]/', $token);
        $this->assertRegExp('/[a-z]/', $token);
        $this->assertRegExp('/[A-Z]/', $token);
    }

    public function testGenerateToken_notContainOtherCharacters() {
        $token = Token::generate();

        $this->assertRegExp('/^[a-zA-Z0-9]+$/', $token);
    }

    public function testGenerateToken_isAlwaysDifferent() {
        $token1 = Token::generate();
        $token2 = Token::generate();
        $token3 = Token::generate();

        $this->assertNotEquals($token1, $token2);
        $this->assertNotEquals($token2, $token3);
        $this->assertNotEquals($token1, $token3);
    }

    public function testGenerateToken_returnsHex() {
        $token = Token::generate(128, 16);

        $this->assertRegExp('/^[0-9a-f]{32}$/', $token);
    }

    public function testGenerateToken_generatesMoreRandomStrings() {
        $token = Token::generate(256, 16);

        $this->assertRegExp('/^[0-9a-f]{64}$/', $token);
    }

    public function testGenerateToken_isOnlyPreciseToByte() {
        $token1 = Token::generate(135, 16);
        $token2 = Token::generate(136, 16);

        $this->assertRegExp('/^[0-9a-f]{32}$/', $token1);
        $this->assertRegExp('/^[0-9a-f]{34}$/', $token2);
    }

    public function testGenerateToken_convertsToBase64() {
        $token = Token::generate(96, 64);

        $this->assertRegExp('/^[0-9a-zA-Z+\/]{15,16}$/', $token);
    }

    public function testGenerateToken_acceptsMaxBase64AndFallsBackTo62() {
        $token = Token::generate(96, 128);

        $this->assertRegExp('/^[0-9a-zA-Z]{15,17}$/', $token);
    }

    public function testGenerateToken_getsDecimalInteger() {
        $token = Token::generate(56, 10);

        $this->assertEquals($token, (int)$token);
    }
}
