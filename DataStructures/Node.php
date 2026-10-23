<?php

/**
 * Node.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Linked List Node Class
 */
class Node
{
    public ?Node $next = null;

    public ?Node $prev = null;

    // Constructor
    /**
     * Construct.
     *
     * @param mixed $data The data.
     */
    public function __construct(public $data)
    {
    }
}
