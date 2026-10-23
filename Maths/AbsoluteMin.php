<?php

/**
 * Absolute min.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * This function calculates
 * Absolute min values from
 * the different numbers
 * provided.
 *
 * @param decimal $numbers  A variable sized number input
 *
 * @throws \Exception
 *
 * @return decimal $absoluteMin Absolute min value
 */
function absolute_min(...$numbers)
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find absolute min value');
    }

    $absoluteMin = $numbers[0];
    $counter = count($numbers);
    for ($loopIndex = 0; $loopIndex < $counter; $loopIndex++) {
        if ($numbers[$loopIndex] < $absoluteMin) {
            $absoluteMin = $numbers[$loopIndex];
        }
    }

    return $absoluteMin;
}
