<?php

/**
 * Check palindrome.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function checks if given number is palindromic
 * e.g. 121
 *
 * @param int $input
 *
 * @return bool
 */
function isNumberPalindromic(int $input): bool
{
    $arr = array_map('intval', str_split((string) $input));
    $arrRev = array_reverse($arr);
    $inputRev = (int)implode("", $arrRev);
    return $input === $inputRev;
}
