<?php

declare(strict_types=1);

/**
 * Checks if two strings are anagrams of each other.
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
