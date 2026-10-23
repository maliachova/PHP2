<?php

/**
 * Test cases for railfence cipher.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php'; // Adjust the path as needed
// Adjust the path as needed
require_once __DIR__ . '/../../Ciphers/RailfenceCipher.php';

/**
 * Test cases for railfence cipher.
 */
class RailfenceCipherTest extends TestCase
{
    /**
     * Test railfence cipher case1.
     *
     * @return mixed
     */
    public function testRailfenceCipherCase1()
    {
        $plainMessage = "ABCDEF";
        $rails = 3;
        $cipherMessage = Railencode($plainMessage, $rails);
        $decodedMessage = Raildecode($cipherMessage, $rails);
        $this->assertEquals($plainMessage, $decodedMessage);
    }
    /**
     * Test railfence cipher case2.
     *
     * @return mixed
     */
    public function testRailfenceCipherCase2()
    {
        $plainMessage = "THIS IS RAILFENCE";
        $rails = 3;
        $cipherMessage = Railencode($plainMessage, $rails);
        $decodedMessage = Raildecode($cipherMessage, $rails);
        $this->assertEquals($plainMessage, $decodedMessage);
    }
}
