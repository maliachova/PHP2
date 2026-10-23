<?php

/**
 * Perfect square.
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
 * the provided number is a
 * perfect square or not.
 *
 * @param Decimal $number A decimal input
 *
 * @return boolean whether the number is perfect square or not
 */
function isPerfectSquare($number): bool
{
    $root = (int) sqrt($number);
    // If number's square root is an integer then it's a perfect square else not
    return (($root * $root) === $number);
}
