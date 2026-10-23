<?php

/**
 * Test cases for atbash cipher.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/AtbashCipher.php';

/**
 * Test cases for atbash cipher.
 */
class AtbashCipherTest extends TestCase
{
    /**
     * Test encryption and decryption.
     *
     * @return mixed
     */
    public function testEncryptionAndDecryption()
    {
        $plainText = "HELLO";
        $encryptedText = atbash_encrypt($plainText);
        $decryptedText = atbash_decrypt($encryptedText);
        $this->assertEquals($plainText, $decryptedText);
    }

    /**
     * Test with non alphabet characters.
     *
     * @return mixed
     */
    public function testWithNonAlphabetCharacters()
    {
        $plainText = "HELLO, WORLD!";
        $encryptedText = atbash_encrypt($plainText);
        $decryptedText = atbash_decrypt($encryptedText);
        $this->assertEquals($plainText, $decryptedText);
    }
}
