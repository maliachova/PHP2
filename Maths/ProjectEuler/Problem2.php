<?php

/**
 * Problem2.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Problem2.
 *
 * @return int
 */
function problem2(): int
{
    $maxNumber = 4000000;
    $currNumber = 1;
    $nextNumber = 2;
    $answer = 0;

    while ($currNumber <= $maxNumber) {
        $answer += $currNumber % 2 == 0 ? $currNumber : 0;
        [$currNumber, $nextNumber] = [$nextNumber, $currNumber + $nextNumber];
    }

    return $answer;
}
