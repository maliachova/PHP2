<?php

/**
 * Test cases for mono alphabetic cipher.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/MonoAlphabeticCipher.php';

/**
 * Test cases for mono alphabetic cipher.
 */
class MonoAlphabeticCipherTest extends TestCase
{
    /**
     * Test mono alphabetic cipher.
     *
     * @return mixed
     */
    public function testMonoAlphabeticCipher()
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $key = "yhkqgvxfoluapwmtzecjdbsnri";
        $text = "I love1234 GitHub";
        $encryptedText = "O ambg XojFdh";
        $this->assertEquals(maEncrypt($key, $alphabet, $text), $encryptedText);
        $this->assertEquals(
            maDecrypt($key, $alphabet, $encryptedText),
            "I love GitHub"
        );
    }
}
