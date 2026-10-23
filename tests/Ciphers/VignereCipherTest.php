<?php

/**
 * Test cases for vignere cipher.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/VignereCipher.php';

/**
 * Test cases for vignere cipher.
 */
class VignereCipherTest extends TestCase
{
    /**
     * Test vignere cipher.
     *
     * @return mixed
     */
    public function testVignereCipher()
    {
        $plaintext = "HELLO";
        $key = "KEY";
        $encryptedText = vigenere_encrypt($plaintext, $key);
        $decryptedText = vigenere_decrypt($encryptedText, $key);

        $this->assertEquals($plaintext, $decryptedText);
    }
}
