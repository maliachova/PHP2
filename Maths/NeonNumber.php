<?php

/**
 * Neon number.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Is number neon.
 *
 * @param mixed $input The input.
 *
 * @return bool
 */
function isNumberNeon($input): bool
{
    $inputSquare = $input * $input;
    $inputArr = array_map('intval', str_split((string) $inputSquare));
    $sumOfSquareDigits = 0;
    foreach ($inputArr as $digit) {
        $sumOfSquareDigits += $digit;
    }

    return $sumOfSquareDigits == $input;
}
