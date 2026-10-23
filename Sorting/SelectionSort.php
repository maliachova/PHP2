<?php

/**
 * Selection sort.
 *
 * PHP version 8.2
 *
 * @category Sorting
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Selection Sort
 *
 * @param array $array
 *
 * @return array
 */
function selectionSort(array $array): array
{
    $length = count($array);

    for ($i = 0; $i < $length; $i++) {
        $lowest = $i;

        for ($j = $i + 1; $j < $length; $j++) {
            if ($array[$j] < $array[$lowest]) {
                $lowest = $j;
            }
        }

        if ($i !== $lowest) {
            $temp = $array[$i];
            $array[$i] = $array[$lowest];
            $array[$lowest] = $temp;
        }
    }

    return $array;
}
