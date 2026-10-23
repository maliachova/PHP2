<?php

/**
 * Problem9.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Problem9.
 *
 * @return int
 */
function problem9(): int
{
    for ($i = 0; $i <= 300; $i++) {
        for ($j = 0; $j <= 400; $j++) {
            $k = 1000 - $i - $j;
            if ($i * $i + $j * $j === $k * $k) {
                return $i * $j * $k;
            }
        }
    }

    return 0;
}
