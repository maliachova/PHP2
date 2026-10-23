<?php

/**
 * Linear search.
 *
 * PHP version 8.2
 *
 * @category Searches
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Linear search in PHP
 *
 * Reference: https://www.geeksforgeeks.org/linear-search/
 *
 * Examples:
 *  data =  5, 7, 8, 11, 12, 15, 17, 18, 20
 *  x = 15
 *  Element found at position 6
 *
 *  x = 1
 *  Element not found
 *
 *  @param Array $list an array of integers to search
 *  @param integer $target an integer number to search for in the list
 *  @return integer the index where the target is found (or -1 if not found)
 *
 * @param array $list
 * @param mixed $target
 *
 * @return int
 */
function linearSearch(array $list, $target): int
{
    $n = count($list);
    for ($i = 0; $i < $n; $i++) {
        if ($list[$i] == $target) {
            return $i + 1;
        }
    }

    return -1;
}
