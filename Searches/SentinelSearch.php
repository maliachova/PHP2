<?php

/**
 * Sentinel search.
 *
 * PHP version 8.2
 *
 * @category Searches
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/* SentinelSearch
    Input : -
    parameter 1: Array
    parameter 2: Target element

    Output : -
    Returns index of element if found, else -1
*/
/**
 * Sentinel search.
 *
 * @param mixed $list   The list.
 * @param mixed $target The target.
 *
 * @return int
 */
function SentinelSearch($list, $target): int
{
    //Length of array
    $len = count($list);

    //Store last element of array
    $lastElement = $list[$len - 1];

    //Put target at the last position of array known as 'Sentinel'
    if ($lastElement == $target) {
        return ($len - 1);
    }

    //Put target at last index of array
    $list[$len - 1] = $target;

    //Initialize variable to traverse through array
    $i = 0;

    //Traverse through array to search target
    while ($list[$i] != $target) {
        $i++;
    }

    //Put last element at it's position
    $list[$len - 1] = $lastElement;

    //If i in less than length, It means element is present in array
    if ($i < ($len - 1)) {
        return $i;
    }
    return -1;
}
