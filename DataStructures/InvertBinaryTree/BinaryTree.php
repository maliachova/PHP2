<?php

/**
 * Binary tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\InvertBinaryTree;

/**
 * Binary tree class.
 */
class BinaryTree
{
    private ?BinaryTree $_left = null;

    private ?BinaryTree $_right = null;

    private $_value;

    /**
     * Set left.
     *
     * @param ?BinaryTree $left The left.
     *
     * @return static
     */
    public function setLeft(?BinaryTree $left): static
    {
        $this->_left = $left;
        return $this;
    }

    /**
     * Get left.
     *
     * @return ?BinaryTree
     */
    public function getLeft(): ?BinaryTree
    {
        return $this->_left;
    }

    /**
     * Set right.
     *
     * @param ?BinaryTree $right The right.
     *
     * @return static
     */
    public function setRight(?BinaryTree $right): static
    {
        $this->_right = $right;
        return $this;
    }

    /**
     * Get right.
     *
     * @return ?BinaryTree
     */
    public function getRight(): ?BinaryTree
    {
        return $this->_right;
    }

    /**
     * Set value.
     *
     * @param mixed $value The value.
     *
     * @return static
     */
    public function setValue($value): static
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Get value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }
}
