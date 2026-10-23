<?php

/**
 * Mean.
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
 * The mean value of
 * numbers provided
 *
 * @param decimal $numbers  A variable sized number input
 *
 * @throws \Exception
 *
 * @return decimal $mean Mean of provided numbers
 */
function mean(...$numbers): int|float
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find mean value');
    }

    $total = array_sum($numbers);

    return $total / count($numbers);
}
