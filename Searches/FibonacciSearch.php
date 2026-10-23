<?php

/**
 * Fibonacci search.
 *
 * PHP version 8.2
 *
 * @category Searches
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Function to find nth number in Fibonacci sequence.
 * Uses a version of memoization and runs very fast!
 */

/**
 * Fibonacci position.
 *
 * @param int $n position to check
 * @param array $m array to store solved trees
 *
 * @return mixed
 */
function fibonacciPosition(int $n, array &$m = [])
{
    if (isset($m[$n])) {
        return $m[$n];
    }

    if ($n < 2) {
        return $n;
    }

    $m[$n] = fibonacciPosition($n - 1, $m) + fibonacciPosition($n - 2, $m);

    return $m[$n];
}

print fibonacciPosition(59);
