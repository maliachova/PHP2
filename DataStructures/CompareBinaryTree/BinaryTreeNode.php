<?php

/**
 * Binary tree node.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\CompareBinaryTree;

/**
 * Binary tree node class.
 */
class BinaryTreeNode
{
    /**
     * Construct.
     *
     * @param mixed $value
     * @param ?BinaryTreeNode $left
     * @param ?BinaryTreeNode $right
     */
    public function __construct(
        public $value,
        public ?BinaryTreeNode $left = null,
        public ?BinaryTreeNode $right = null
    ) {
    }
}
