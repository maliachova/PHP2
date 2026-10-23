<?php

/**
 * Execution time.
 *
 * PHP version 8.2
 *
 * @category Utils
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
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
    private readonly string|float $_start_time;

    private $_end_time = 0;

    private $_execution_time = 0;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->_start_time = microtime(true);
    }

    /**
     * Destruct.
     */
    public function __destruct()
    {
        $this->_end_time = microtime(true);
        $this->_execution_time = $this->_end_time - $this->_start_time;
        echo "Executed in $this->_execution_time seconds\n";
    }
}
