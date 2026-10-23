<?php

/**
 * Check prime.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function check whether
 * the provided integer is a prime
 * number or not.
 *
 * @param Integer $number An integer input
 *
 * @return boolean whether the number is prime or not
 */
function isPrime(int $number): bool
{
    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0 || $number < 2) {
        return false;
    }

    $i = 3;
    while ($i <= sqrt($number)) {
        if ($number % $i === 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}
