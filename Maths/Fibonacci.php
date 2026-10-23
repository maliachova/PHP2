<?php

/**
 * Fibonacci.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Fibonacci recursive
 *
 * @param int $num The num.
 *
 * @throws \Exception
 *
 * @return array
 */
function fibonacciRecursive(int $num): array
{
    /*
     * Fibonacci series using recursive approach
     */

    $fibonacciRecursive = [];
    for ($i = 0; $i < $num; $i++) {
        $fibonacciRecursive[] = recursive($i);
    }

    return $fibonacciRecursive;
}

/**
 * Recursive.
 *
 * @param int $num The num.
 *
 * @throws \Exception
 *
 * @return int|float
 */
function recursive(int $num): float|int
{
    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    }
    if ($num == 0 || $num == 1) {
        return $num;
    } else {
        return recursive($num - 1) + recursive($num - 2);
    }
}

/**
 * Fibonacci with binet formula.
 *
 * @param int $num The num.
 *
 * @throws \Exception
 *
 * @return int[]
 */
function fibonacciWithBinetFormula(int $num): array
{
    /*
     * Fibonacci series using Binet's formula given below
     * binet's formula =  ((1 + sqrt(5) / 2 ) ^ n - (1 - sqrt(5) / 2 ) ^ n ) ) /
     * sqrt(5)
     * More about Binet's formula found at
     * http://www.maths.surrey.ac.uk/hosted-sites/R.Knott/Fibonacci/fibFormula.html#section1
     */

    $fib_series = [];

    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    }
    $sqrt = sqrt(5);
    $phi_1 = (1 + $sqrt) / 2;
    $phi_2 = (1 - $sqrt) / 2;
    foreach (range(0, $num - 1) as $n) {
        $seriesNumber = ($phi_1 ** $n - $phi_2 ** $n) / $sqrt;
        $fib_series[] = (int)$seriesNumber;
    }

    return $fib_series;
}
