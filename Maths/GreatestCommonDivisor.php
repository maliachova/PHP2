<?php

/**
 * Greatest common divisor.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function finds the greatest common division using Euclidean algorithm
 * example: gcd(30, 24) => 6
 *
 * @param int $a The a.
 * @param int $b The b.
 *
 * @return int
 */
function gcd(int $a, int $b): int
{
    if ($b == 0) {
        return $a;
    }

    return gcd($b, $a % $b);
}
