<?php

/**
 * Test cases for array helpers.
 *
 * PHP version 8.2
 *
 * @category Utils
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Utils/ArrayHelpers.php';

/**
 * Test cases for array helpers.
 */
class ArrayHelpersTest extends TestCase
{
    /**
     * Test is sorted ascending ints accepts sorted integers.
     *
     * @return void
     */
    public function testIsSortedAscendingIntsAcceptsSortedIntegers(): void
    {
        $this->expectNotToPerformAssertions();

        isSortedAscendingInts([1, 2, 3]);
    }

    /**
     * Test is sorted ascending ints rejects unsorted values.
     *
     * @return void
     */
    public function testIsSortedAscendingIntsRejectsUnsortedValues(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        isSortedAscendingInts([1, 3, 2]);
    }
}
