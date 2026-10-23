<?php

/**
 * Fibonacci2.
 *
 * PHP version 8.2
 *
 * @category Maths
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Print Fibocanni sequence using a generator
 */

/**
 * Loop.
 *
 * @param int $i number of Fibonacci numbers to generate
 * @param Generator $set Fibonacci calculator
 *
 * @return mixed
 */
function loop($i, Generator $set)
{
    while ($i-- > 0 && $set->valid()) {
        yield $set->current();
        $set->next();
    }
}

/*
 * Fibonacci generator
 */
/**
 * Fib.
 *
 * @return mixed
 */
function fib()
{
    yield $i = 0;
    yield $j = 1;

    while (true) {
        yield $k = $i + $j;
        $i = $j;
        $j = $k;
    }
}

/*
 * Generate 100 Fibonacci numbers
 */
foreach (loop(100, fib()) as $item) {
    print($item . ',');
}
