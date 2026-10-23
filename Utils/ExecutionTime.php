<?php

/**
 * Execution time.
 *
 * PHP version 8.2
 *
 * @category Utils
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Run script and test execution time with following script
        $executionTime = New ExecutionTime();
        print_r(fibonacciRecursive(10));
 */
/**
 * Execution time class.
 */
class ExecutionTime
{
    private readonly string|float $start_time;

    private $end_time = 0;

    private $execution_time = 0;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->start_time = microtime(true);
    }

    /**
     * Destruct.
     */
    public function __destruct()
    {
        $this->end_time = microtime(true);
        $this->execution_time = $this->end_time - $this->start_time;
        echo "Executed in $this->execution_time seconds\n";
    }
}
