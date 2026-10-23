<?php

/**
 * Problem3.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Problem3.
 *
 * @return int
 */
function problem3(): int
{
    $n = 600851475143;
    $i = 2;
    while ($i * $i < $n) {
        while ($n % $i == 0) {
            $n /= $i;
        }

        $i++;
    }

    return $n;
}
