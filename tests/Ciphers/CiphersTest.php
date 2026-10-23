<?php

/**
 * Test cases for ciphers.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/CaesarCipher.php';
require_once __DIR__ . '/../../Ciphers/XORCipher.php';

/**
 * Test cases for ciphers.
 */
class CiphersTest extends TestCase
{
    /**
     * Test caesar cipher.
     *
     * @return mixed
     */
    public function testCaesarCipher()
    {
        $this->assertEquals('Aopz pz h alza.', encrypt('This is a test.', 7));
        $this->assertEquals('Aopz pz h alza.', encrypt('This is a test.', 7 + 26));
        $this->assertEquals('This is a test.', decrypt('Aopz pz h alza.', 7));
        $this->assertEquals('This is a test.', decrypt('Aopz pz h alza.', 7 + 26));
    }

    /**
     * Test xor cipher.
     *
     * @return mixed
     */
    public function testXorCipher()
    {
        $input_str = "test@string";
        $key = "test-key";
        $invalid_key = "wrong-key";
        $this->assertEquals(
            $input_str,
            xorCipher(xorCipher($input_str, $key), $key)
        );
        $this->assertNotEquals(
            $input_str,
            xorCipher(xorCipher($input_str, $key), $invalid_key)
        );
    }
}
