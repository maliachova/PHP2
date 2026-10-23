<?php

/**
 * Bst node.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request:
 * #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\BinarySearchTree;

/**
 * Bst node class.
 */
class BSTNode
{
    public ?BSTNode $left = null;

    public ?BSTNode $right = null;

    public ?BSTNode $parent = null;

    /**
     * Construct.
     *
     * @param int   $key   The key of the node.
     * @param mixed $value The associated value.
     */
    public function __construct(public int $key, public mixed $value)
    {
    }

    /**
     * Is root.
     *
     * @return bool
     */
    public function isRoot(): bool
    {
        return !$this->parent instanceof \DataStructures\BinarySearchTree\BSTNode;
    }

    /**
     * Is leaf.
     *
     * @return bool
     */
    public function isLeaf(): bool
    {
        return !$this->left instanceof \DataStructures\BinarySearchTree\BSTNode
            && !$this->right instanceof \DataStructures\BinarySearchTree\BSTNode;
    }

    /**
     * Get children.
     *
     * @return array
     */
    public function getChildren(): array
    {
        if ($this->isLeaf()) {
            return [];
        }

        $children = [];
        if ($this->left instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $children['left'] = $this->left;
        }

        if ($this->right instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $children['right'] = $this->right;
        }

        return $children;
    }

    /**
     * Get children count.
     *
     * @return int
     */
    public function getChildrenCount(): int
    {
        return count($this->getChildren());
    }
}
