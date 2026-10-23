<?php

/**
 * Factorial.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function calculates
 * and returns the factorial
 * of provided positive integer
 * number.
 *
 * @param Integer $number  Integer input
 *
 * @throws \Exception
 *
 * @return Integer Factorial of the input
 */
function factorial(int $number)
{
    static $cache = []; //internal caching memory for speed

    if ($number < 0) {
        throw new \Exception(
            "Negative numbers are not allowed for calculating Factorial"
        );
    }

    // Factorial of 0 is 1
    if ($number === 0) {
        return 1;
    }

    if (isset($cache[$number])) {
        return $cache[$number];
    }

    // Recursion since x! = x * (x-1)!
    $fact = ($number * factorial($number - 1));

    $cache[$number] = $fact;

    return $fact;
}
