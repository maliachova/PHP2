<?php

/**
 * Check anagram.
 *
 * PHP version 8.2
 *
 * @category Strings
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Checks if two strings are anagrams of each other.
 *
 * @param string $originalString  The original string.
 * @param string $testString      The test string.
 * @param bool   $caseInsensitive The case insensitive.
 *
 * @return bool
 */
function isAnagram(
    string $originalString,
    string $testString,
    bool $caseInsensitive = true
): bool {
    if ($caseInsensitive) {
        // Converting string to lowercase for case-insensitive check
        $originalString = strtolower($originalString);
        $testString = strtolower($testString);
    }

    // count_chars(string, mode = 1) returns key-value pairs with character as key,
    // frequency as value
    // We can directly compare the arrays in this case
    return count_chars($originalString, 1) === count_chars($testString, 1);
}
