<?php

/**
 * Count homogenous.
 *
 * PHP version 8.2
 *
 * @category Strings
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Count homogenous substrings
 *
 * @param String $s The s.
 *
 * @return int
 */
function countHomogenous($s): int
{
    // Initialize the count of homogeneous substrings
    $count = 0;

    // Length of the string
    $length = strlen($s);

    if ($length == 0) {
        return 0; // If the string is empty, return 0
    }

    // Initialize the count of homogeneous substrings
    $count = 1; // Start with 1 since the first character itself starts a substring

    // Loop through each character in the string, starting from the second character
    for ($i = 1; $i < $length; $i++) {
        // Check if current character is not the same as the previous one
        if ($s[$i] != $s[$i - 1]) {
            $count++; // A new substring starts, increment the count
        }
    }

    return $count;
}
