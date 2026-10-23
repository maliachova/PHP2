<?php

/**
 * Count sentences.
 *
 * PHP version 8.2
 *
 * @category Strings
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This is a simple way to count sentence
 * using php preg_match_all() function
 *
 * @param string $sentence
 *
 * @return int
 */
function countSentences(string $sentence): int
{
    $sentence = trim($sentence);

    return preg_match_all('/[^\s|^\...](\.|\!|\?)(?!\w)/', $sentence);
}
