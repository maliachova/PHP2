<?php

/**
 * Test cases for morse code.
 *
 * PHP version 8.2
 *
 * @category Ciphers
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Ciphers/MorseCode.php';

/**
 * Test cases for morse code.
 */
class MorseCodeTest extends TestCase
{
    /**
     * Test morse code cipher.
     *
     * @return mixed
     */
    public function testMorseCodeCipher()
    {
        $this->assertEquals('TEST 123', decode(encode('TEST 123')));
    }
}
