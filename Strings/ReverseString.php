<?php

/**
 * Reverse string.
 *
 * PHP version 8.2
 *
 * @category Strings
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function returns a given string in reverse order
 *
 * @param string $string The string.
 *
 * @return string
 */
function reverseString(string $string): string
{
    $string = trim($string); // Removing leading and trailing spaces

    $characters = str_split($string);

    $reversedCharacters = [];

    for ($i = (count($characters) - 1); $i >= 0; $i--) {
        $reversedCharacters[] = $characters[$i];
    }

    return implode('', $reversedCharacters);
}
