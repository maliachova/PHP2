<?php

/**
 * Reverse words.
 *
 * PHP version 8.2
 *
 * @category Strings
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function returns a given sentence with its words
 * in reverse order
 *
 * @param string $text The text.
 *
 * @return string
 */
function reverseWords(string $text): string
{
    $text          = trim($text);
    $words         = explode(' ', $text);
    $reversedWords = [];

    for ($i = (count($words) - 1); $i >= 0; $i--) {
        $reversedWords[] = $words[$i];
    }

    return implode(' ', $reversedWords);
}
