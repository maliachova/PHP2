<?php

/**
 * Mode.
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
 * the mode value(s) of
 * numbers provided
 *
 * @param decimal $numbers A variable sized number input
 *
 * @throws \Exception
 *
 * @return array $modes Array of mode(s) of provided numbers
 */
function mode(...$numbers): array
{
    if ($numbers === []) {
        throw new \Exception('Please pass values to find the mode');
    }

    $values = array_count_values($numbers);
    $maxCount = max($values);
    return array_keys($values, $maxCount, true);
}
