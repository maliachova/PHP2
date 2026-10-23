<?php

/**
 * Problem10.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * This function solves the problem 10 of the Project Euler.
 *
 * Problem description:
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 * Find the sum of all the primes below two million.
 */
/**
 * Problem10.
 *
 * @return int
 */
function problem10(): int
{
    //Using Sieve of Erastothenes
    //@see https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes

    $n = 2000000;
    $isPrime = [];

    for ($i = 2; $i <= $n; $i++) {
        $isPrime[$i] = $i;
    }

    for ($i = 2; $i * $i <= $n; $i++) {
        if (isset($isPrime[$i])) {
            for ($j = $i; $i * $j <= $n; $j++) {
                unset($isPrime[$i * $j]);
            }
        }
    }

    return array_sum($isPrime);
}
