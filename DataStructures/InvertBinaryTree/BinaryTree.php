<?php

/**
 * Binary tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\InvertBinaryTree;

/**
 * Binary tree class.
 */
class BinaryTree
{
    private ?BinaryTree $left = null;

    private ?BinaryTree $right = null;

    private $value;

    /**
     * Set left.
     *
     * @param ?BinaryTree $left
     *
     * @return static
     */
    public function setLeft(?BinaryTree $left): static
    {
        $this->left = $left;
        return $this;
    }

    /**
     * Get left.
     *
     * @return ?BinaryTree
     */
    public function getLeft(): ?BinaryTree
    {
        return $this->left;
    }

    /**
     * Set right.
     *
     * @param ?BinaryTree $right
     *
     * @return static
     */
    public function setRight(?BinaryTree $right): static
    {
        $this->right = $right;
        return $this;
    }

    /**
     * Get right.
     *
     * @return ?BinaryTree
     */
    public function getRight(): ?BinaryTree
    {
        return $this->right;
    }

    /**
     * Set value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function setValue($value): static
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
