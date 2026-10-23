<?php

/**
 * Absolute max.
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
 * Absolute max values from
 * the different numbers
 * provided
 *
 * @param decimal $numbers  A variable sized number input
 *
 * @throws \Exception
 *
 * @return decimal $absoluteMax Absolute max value
 */
function absolute_max(...$numbers)
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find absolute max value');
    }

    $absoluteMax = $numbers[0];
    $counter = count($numbers);
    for ($loopIndex = 0; $loopIndex < $counter; $loopIndex++) {
        if ($numbers[$loopIndex] > $absoluteMax) {
            $absoluteMax = $numbers[$loopIndex];
        }
    }

    return $absoluteMax;
}
