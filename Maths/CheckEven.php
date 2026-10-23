<?php

/**
 * Check even.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function checks whether
 * the provided integer is even.
 *
 * @param int $number An integer input
 *
 * @return bool whether the number is even or not
 */
function isEven(int $number): bool
{
    return $number % 2 === 0;
}
