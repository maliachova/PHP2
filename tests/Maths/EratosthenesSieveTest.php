<?php

/**
 * Test cases for eratosthenes sieve.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/EratosthenesSieve.php';

use PHPUnit\Framework\TestCase;

/**
 * Test cases for eratosthenes sieve.
 */
class EratosthenesSieveTest extends TestCase
{
    /**
     * Test eratosthenes sieve.
     *
     * @return mixed
     */
    public function testEratosthenesSieve()
    {
        $result = eratosthenesSieve(30);

        $this->assertEquals($result, [1, 2, 3, 5, 7, 11, 13, 17, 19, 23, 29]);
    }
}
