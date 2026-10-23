<?php

/**
 * Problem7.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Problem7.
 *
 * @return int
 */
function problem7(): int
{
    $numberOfPrimes = 0;
    $number = 0;
    while ($numberOfPrimes < 10001) {
        $number++;
        if (isPrime($number)) {
            $numberOfPrimes++;
        }
    }

    return $number;
}
