<?php

/**
 * Test cases for maths.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Maths/AbsoluteMax.php';
require_once __DIR__ . '/../../Maths/ArmstrongNumber.php';
require_once __DIR__ . '/../../Maths/AbsoluteMin.php';
require_once __DIR__ . '/../../Maths/CheckEven.php';
require_once __DIR__ . '/../../Maths/CheckPalindrome.php';
require_once __DIR__ . '/../../Maths/CheckPrime.php';
require_once __DIR__ . '/../../Maths/CheckOdd.php';
require_once __DIR__ . '/../../Maths/Factorial.php';
require_once __DIR__ . '/../../Maths/FastExponentiation.php';
require_once __DIR__ . '/../../Maths/Fibonacci.php';
require_once __DIR__ . '/../../Maths/Fibonacci2.php';
require_once __DIR__ . '/../../Maths/GreatestCommonDivisor.php';
require_once __DIR__ . '/../../Maths/NeonNumber.php';
require_once __DIR__ . '/../../Maths/PerfectSquare.php';
require_once __DIR__ . '/../../Maths/Mean.php';
require_once __DIR__ . '/../../Maths/Median.php';
require_once __DIR__ . '/../../Maths/Mode.php';
require_once __DIR__ . '/../../Maths/FastInverseSquareRoot.php';
require_once __DIR__ . '/../../Maths/BaseX.php';
require_once __DIR__ . '/../../Maths/PerfectNumber.php';

/**
 * Test cases for maths.
 */
class MathsTest extends TestCase
{
    /**
     * Test base x.
     *
     * @return mixed
     */
    public function testBaseX()
    {
        $this->assertEquals(11, baseX(3, 2));
        $this->assertEquals(22, baseX(8, 3));
        $this->assertEquals(21, baseX(15, 7));
        $this->assertEquals(20, baseX(16, 8));
    }

    /**
     * Test factorial.
     *
     * @return mixed
     */
    public function testFactorial()
    {
        $this->assertEquals(1, factorial(1));
        $this->assertEquals(120, factorial(5));
        $this->assertEquals(1, factorial(0));
        $this->expectException(\Exception::class);
        factorial(-25);
    }

    /**
     * Test is even.
     *
     * @return mixed
     */
    public function testIsEven()
    {
        $this->assertTrue(isEven(2));
        $this->assertTrue(isEven(0));
        $this->assertFalse(isEven(3));
        $this->assertFalse(isEven(17));
        $this->assertTrue(isEven(-4));
    }

    /**
     * Test is number armstrong.
     *
     * @return mixed
     */
    public function testIsNumberArmstrong()
    {
        $this->assertTrue(isNumberArmstrong(153));
        $this->assertFalse(isNumberArmstrong(123));
        $this->assertTrue(isNumberArmstrong(370));
        $this->assertFalse(isNumberArmstrong(2468));
    }

    /**
     * Test is number palindromic.
     *
     * @return mixed
     */
    public function testIsNumberPalindromic()
    {
        $this->assertTrue(isNumberPalindromic(121));
        $this->assertFalse(isNumberPalindromic(123));
        $this->assertTrue(isNumberPalindromic(123321));
        $this->assertFalse(isNumberPalindromic(2468));
    }

    /**
     * Test is odd.
     *
     * @return mixed
     */
    public function testIsOdd()
    {
        $this->assertTrue(isOdd(3));
        $this->assertTrue(isOdd(17));
        $this->assertFalse(isOdd(4));
        $this->assertFalse(isOdd(0));
        $this->assertTrue(isOdd(-5));
    }

    /**
     * Test is prime.
     *
     * @return mixed
     */
    public function testIsPrime()
    {
        $this->assertTrue(isPrime(73));
        $this->assertFalse(isPrime(21));
        $this->assertFalse(isPrime(1));
        $this->assertTrue(isPrime(997));
    }

    /**
     * Test absolute max.
     *
     * @return mixed
     */
    public function testAbsoluteMax()
    {
        $this->assertEquals(50, absolute_max(12, 20, 35, 50, 50, 23));
        $this->assertEquals(13, absolute_max(13));
        $this->assertEquals(54, absolute_max(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_max();
    }

    /**
     * Test absolute min.
     *
     * @return mixed
     */
    public function testAbsoluteMin()
    {
        $this->assertEquals(12, absolute_min(12, 20, 35, 50, 50, 23));
        $this->assertEquals(13, absolute_min(13));
        $this->assertEquals(12, absolute_min(12, 13, 54, 22));
        $this->expectException(\Exception::class);
        absolute_min();
    }

    /**
     * Test perfect square.
     *
     * @return mixed
     */
    public function testPerfectSquare()
    {
        $this->assertTrue(isPerfectSquare(25));
        $this->assertFalse(isPerfectSquare(43));
        $this->assertFalse(isPerfectSquare(2));
        $this->assertTrue(isPerfectSquare(225));
    }

    /**
     * Test fast exponentiation.
     *
     * @return mixed
     */
    public function testFastExponentiation()
    {
        $this->assertEquals(1, fastExponentiation(10, 0));
        $this->assertEquals(10, fastExponentiation(10, 1));
        $this->assertEquals(100, fastExponentiation(10, 2));
        $this->assertEquals(1000, fastExponentiation(10, 3));
        $this->assertEquals(3200000, fastExponentiation(20, 5));
    }

    /**
     * Test fibonacci series.
     *
     * @return mixed
     */
    public function testFibonacciSeries()
    {
        $this->assertEquals([0, 1, 1, 2, 3], fibonacciRecursive(5));
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            fibonacciRecursive(10)
        );

        $this->assertEquals([0, 1, 1, 2, 3], fibonacciWithBinetFormula(5));
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            fibonacciWithBinetFormula(10)
        );
    }

    /**
     * Test neon number.
     *
     * @return mixed
     */
    public function testNeonNumber()
    {
        $this->assertTrue(isNumberNeon(1));
        $this->assertFalse(isNumberNeon(43));
        $this->assertFalse(isNumberNeon(123));
        $this->assertTrue(isNumberNeon(9));
    }

    /**
     * Test fibonacci generator.
     *
     * @return mixed
     */
    public function testFibonacciGenerator()
    {
        $this->assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            iterator_to_array(loop(10, fib()))
        );

        $this->assertEquals([0, 1, 1, 2, 3], iterator_to_array(loop(5, fib())));
        $this->assertEquals(
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            iterator_to_array(loop(10, fib()))
        );
    }

    /**
     * Test mean.
     *
     * @return mixed
     */
    public function testMean()
    {
        $this->assertEquals(
            (2 + 4 + 6 + 8 + 20 + 50 + 70) / 7,
            mean(2, 4, 6, 8, 20, 50, 70)
        );

        $this->assertEquals(
            (-5 - 7 + 10) / 3,
            mean(-5, -7, 10)
        );

        $this->assertEquals(-1, mean(-1));
    }

    /**
     * Test median.
     *
     * @return mixed
     */
    public function testMedian()
    {
        $this->assertEquals(3, median(1, 2, 3, 4, 5));
        $this->assertEquals(4.5, median(1, 2, 3, 4, 5, 6, 7, 8));
        $this->assertEquals(3, median(5, 3, 1, 2, 4));
    }

    /**
     * Test median rejects non numeric values.
     *
     * @return mixed
     */
    public function testMedianRejectsNonNumericValues()
    {
        $this->expectException(\Exception::class);

        median('a', 'b', 'c');
    }

    /**
     * Test mode.
     *
     * @return mixed
     */
    public function testMode()
    {
        $this->assertEquals([3], mode(1, 2, 3, 3, 4, 5));
        $this->assertEquals([5, 6], mode(5, 5, 6, 6, 7));
        $this->assertEquals([1, 2, 3, 4, 5], mode(1, 2, 3, 4, 5));
        $this->assertEquals([2, 3, 4], mode(2, 2, 3, 3, 4, 4));
    }

    /**
     * Test greatest common divisor.
     *
     * @return mixed
     */
    public function testGreatestCommonDivisor()
    {
        $this->assertEquals(8, gcd(24, 16));
        $this->assertEquals(5, gcd(10, 5));
        $this->assertEquals(25, gcd(100, 75));
        $this->assertEquals(6, gcd(12, 18));
        $this->assertEquals(5, gcd(10, 15));
        $this->assertEquals(3, gcd(9, 12));
    }

    /**
     * Test perfect number.
     *
     * @return mixed
     */
    public function testPerfectNumber()
    {
        $this->assertTrue(perfect_number(6));
        $this->assertTrue(perfect_number(28));
        $this->assertTrue(perfect_number(496));

        $this->assertFalse(perfect_number(10));
        $this->assertFalse(perfect_number(15));

        $this->assertFalse(perfect_number(-6));
        $this->assertFalse(perfect_number(0));
        $this->assertFalse(perfect_number(1));
        $this->assertFalse(perfect_number(2.5));
        $this->assertFalse(perfect_number("string"));
    }

    /**
     * Test fast inverse square root.
     *
     * @return mixed
     */
    public function testFastInverseSquareRoot()
    {
        $this->assertEqualsWithDelta(0.31568579235273, fastInvSqrt(10), 0.00001);
        $this->assertEqualsWithDelta(0.49915357479239, fastInvSqrt(4), 0.00001);
    }
}
