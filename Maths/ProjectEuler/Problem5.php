<?php

/**
 * Problem5.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Problem5.
 *
 * @return int
 */
function problem5(): int
{
    $number = 20;
    while (true) {
        $isSolution = true;
        for ($i = 11; $i <= 20; $i++) {
            if ($number % $i !== 0) {
                $isSolution = false;
                break;
            }
        }

        if ($isSolution) {
            return $number;
        }

        $number += 20;
    }
}
