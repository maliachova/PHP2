<?php

/**
 * Duplicate key exception.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\BinarySearchTree;

use LogicException;

/**
 * Duplicate key exception class.
 */
class DuplicateKeyException extends LogicException
{
    /**
     * Construct.
     *
     * @param mixed           $key      The key.
     * @param mixed           $code     The code.
     * @param ?LogicException $previous The previous.
     */
    public function __construct($key, $code = 0, ?LogicException $previous = null)
    {
        $message = "Insertion failed. Duplicate key: " . $key;
        parent::__construct($message, $code, $previous);
    }
}
