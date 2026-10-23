<?php

/**
 * Insertion sort.
 *
 * PHP version 8.2
 *
 * @category Sorting
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Insertion Sort
 *
 * @param array $array
 *
 * @return array
 */
function insertionSort(array $array): array
{
    $counter = count($array);
    for ($i = 1; $i < $counter; $i++) {
        $currentVal = $array[$i];

        for ($j = $i - 1; $j >= 0 && $array[$j] > $currentVal; $j--) {
            $array[$j + 1] = $array[$j];
        }

        $array[$j + 1] = $currentVal;
    }

    return $array;
}
