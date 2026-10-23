<?php

/**
 * Binary tree traversal.
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

use Iterator;

/**
 * Provides tree nodes in several traversal algorithms.
 *
 * Implements the Iterator Interface. Allows tree traversal using loops in tree
 * in-order manner.
 */
class BinaryTreeTraversal implements Iterator
{
    private array $_iterationNodes = [];

    // To store nodes for iteration
    protected const IN_ORDER = 'inOrder';

    private const PRE_ORDER = 'preOrder';

    private const POST_ORDER = 'postOrder';

    protected string $traversalType;

    private int $_currentPosition = 0;

    /**
     * Helps switch traversal type of the binary tree for the Iterator interface
     *
     * @param string $traversalType The traversal type.
     *
     * @return void
     */
    public function setTraversalType(string $traversalType): void
    {
        $this->traversalType = $traversalType;

        // Reset iterator with new traversal
        $this->rewind();
    }

    /**
     * Helper to populate iteration nodes per traversal ype
     *
     * @return void
     */
    private function _loadTraversedNodes(): void
    {
        match ($this->traversalType) {
            self::PRE_ORDER => $this->_preOrderIterator(static::getRoot()),
            self::POST_ORDER => $this->_postOrderIterator(static::getRoot()),
            default => $this->_inOrderIterator(static::getRoot()),
        };
    }

    /**
     * Returns a flat associative array structure for inOrder Traversal
     *
     * @param ?BSTNode $node The node.
     *
     * @return array
     */
    protected function inOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $result += $this->inOrder($node->left);
            $result[$node->key] = $node->value;
            $result += $this->inOrder($node->right);
        }

        return $result;
    }

    /**
     * Returns a flat associative array structure for preOrder Traversal
     *
     * @param ?BSTNode $node The node.
     *
     * @return array
     */
    protected function preOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $result[$node->key] = $node->value;
            $result += $this->preOrder($node->left);
            $result += $this->preOrder($node->right);
        }

        return $result;
    }

    /**
     * Returns a flat associative array structure for postOrder Traversal
     *
     * @param ?BSTNode $node The node.
     *
     * @return array
     */
    protected function postOrder(?BSTNode $node): array
    {
        $result = [];
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $result += $this->postOrder($node->left);
            $result += $this->postOrder($node->right);
            $result[$node->key] = $node->value;
        }

        return $result;
    }

    /**
     *  Returns a flat associative array structure for BFT Traversal
     *
     * @param ?BSTNode $node The node.
     *
     * @return array
     */
    protected function breadthFirst(?BSTNode $node): array
    {
        $result = [];
        if (!isset($node)) {
            return $result;
        }

        $queue = [];
        $queue[] = $node;

        while ($queue !== []) {
            $currentNode = array_shift($queue);
            $result[$currentNode->key] = $currentNode->value;

            if ($currentNode->left !== null) {
                $queue[] = $currentNode->left;
            }

            if ($currentNode->right !== null) {
                $queue[] = $currentNode->right;
            }
        }

        return $result;
    }

    /**
     * Rewind the iterator to the first element.
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->_iterationNodes = [];
        $this->_currentPosition = 0;

        // Load nodes based on traversal type
        $this->_loadTraversedNodes();
    }

    /**
     * Return the current element if exists
     *
     * @return ?BSTNode
     */
    public function current(): ?BSTNode
    {
        return $this->_iterationNodes[$this->_currentPosition] ?? null;
    }

    /**
     * Return the key of the current element.
     *
     * @return int
     */
    public function key(): int
    {
        return $this->_currentPosition;
    }

    /**
     * Move forward to the next element.
     *
     * @return void
     */
    public function next(): void
    {
        $this->_currentPosition++;
    }

    /**
     * Check if the current position is valid.
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->_iterationNodes[$this->_currentPosition]);
    }

    /**
     * Helper function to traverse the tree in-order and fill the $inOrderNodes
     * array.
     *
     * @param ?BSTNode $node The node.
     *
     * @return void
     */
    private function _inOrderIterator(?BSTNode $node): void
    {
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $this->_inOrderIterator($node->left);
            $this->_iterationNodes[] = $node;
            $this->_inOrderIterator($node->right);
        }
    }

    /**
     * Helper function to traverse the tree in-order and fill the $preOrderNodes
     * array.
     *
     * @param ?BSTNode $node The node.
     *
     * @return void
     */
    private function _preOrderIterator(?BSTNode $node): void
    {
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $this->_iterationNodes[] = $node;
            $this->_preOrderIterator($node->left);
            $this->_preOrderIterator($node->right);
        }
    }

    /**
     * Helper function to traverse the tree in-order and fill the $postOrderNodes
     * array.
     *
     * @param ?BSTNode $node The node.
     *
     * @return void
     */
    private function _postOrderIterator(?BSTNode $node): void
    {
        if ($node instanceof \DataStructures\BinarySearchTree\BSTNode) {
            $this->_postOrderIterator($node->left);
            $this->_postOrderIterator($node->right);
            $this->_iterationNodes[] = $node;
        }
    }
}
