<?php

/**
 * Fast exponentiation.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This functions computes an exponent by doing repeated squares
 *
 * @param Integer $base     the base
 * @param Integer $exponent the exponent (ie the number of times that the base is
 * multiplied by itself)
 *
 * @return Integer
 */
function fastExponentiation(int $base, int $exponent)
{
    if ($exponent == 0) {
        return 1;
    }

    if ($exponent == 1) {
        return $base;
    }

    if ($exponent % 2 == 0) {
        return fastExponentiation($base * $base, $exponent / 2);
    }
    return $base * fastExponentiation($base * $base, ($exponent - 1) / 2);
}
