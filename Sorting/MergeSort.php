<?php

/**
 * Merge sort.
 *
 * PHP version 8.2
 *
 * @category Sorting
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Merge Sort
 *
 * @param array $arr The arr.
 *
 * @return array
 */
function mergeSort(array $arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }

    $mid = intdiv(count($arr), 2);
    $leftArray = mergeSort(array_slice($arr, 0, $mid));
    $rightArray = mergeSort(array_slice($arr, $mid));

    return merge($leftArray, $rightArray);
}

/**
 * Merge.
 *
 * @param array $leftArray  The left array.
 * @param array $rightArray The right array.
 *
 * @return array
 */
function merge(array $leftArray, array $rightArray): array
{
    $result = [];
    $i = 0;
    $j = 0;

    while ($i < count($leftArray) && $j < count($rightArray)) {
        if ($rightArray[$j] > $leftArray[$i]) {
            $result[] = $leftArray[$i];
            $i++;
        } else {
            $result[] = $rightArray[$j];
            $j++;
        }
    }

    while ($i < count($leftArray)) {
        $result[] = $leftArray[$i];
        $i++;
    }

    while ($j < count($rightArray)) {
        $result[] = $rightArray[$j];
        $j++;
    }

    return $result;
}
