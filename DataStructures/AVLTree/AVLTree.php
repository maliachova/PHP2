<?php

/**
 * Avl tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed)
 * in Pull Request #163: https://github.com/TheAlgorithms/PHP/pull/163
 * and #173: https://github.com/TheAlgorithms/PHP/pull/173
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\AVLTree;

/**
 * Class AVLTree
 * Implements an AVL Tree data structure with self-balancing capability.
 */
class AVLTree
{
    private ?AVLTreeNode $_root = null;

    private int $_counter = 0;

    /**
     * Get the root node of the AVL Tree.
     *
     * @return ?AVLTreeNode
     */
    public function getRoot(): ?AVLTreeNode
    {
        return $this->_root;
    }

    /**
     * Retrieve a node by its key.
     *
     * @param mixed $key The key of the node to retrieve.
     *
     * @return ?AVLTreeNode The node with the specified key, or null if not found.
     */
    public function getNode(mixed $key): ?AVLTreeNode
    {
        return $this->_searchNode($this->_root, $key);
    }

    /**
     * Get the number of nodes in the AVL Tree.
     *
     * @return int
     */
    public function size(): int
    {
        return $this->_counter;
    }

    /**
     * Insert a key-value pair into the AVL Tree.
     *
     * @param mixed $key   The key to insert.
     * @param mixed $value The value associated with the key.
     *
     * @return void
     */
    public function insert(mixed $key, mixed $value): void
    {
        $this->_root = $this->_insertNode($this->_root, $key, $value);
        $this->_counter++;
    }

    /**
     * Delete a node by its key from the AVL Tree.
     *
     * @param mixed $key The key of the node to delete.
     *
     * @return void
     */
    public function delete(mixed $key): void
    {
        $this->_root = $this->_deleteNode($this->_root, $key);
        $this->_counter--;
    }

    /**
     * Search for a value by its key.
     *
     * @param mixed $key The key to search for.
     *
     * @return mixed The value associated with the key, or null if not found.
     */
    public function search(mixed $key)
    {
        $node = $this->_searchNode($this->_root, $key);
        return $node instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $node->value
            : null;
    }

    /**
     * Perform an in-order traversal of the AVL Tree.
     * Initiates the traversal on the root node directly and returns the array of
     * key-value pairs.
     *
     * @return array
     */
    public function inOrderTraversal(): array
    {
        return TreeTraversal::inOrder($this->_root);
    }

    /**
     * Perform a pre-order traversal of the AVL Tree.
     * Initiates the traversal on the root node directly and returns the array of
     * key-value pairs.
     *
     * @return array
     */
    public function preOrderTraversal(): array
    {
        return TreeTraversal::preOrder($this->_root);
    }

    /**
     * Perform a post-order traversal of the AVL Tree.
     * Initiates the traversal on the root node directly and returns the array of
     * key-value pairs.
     *
     * @return array
     */
    public function postOrderTraversal(): array
    {
        return TreeTraversal::postOrder($this->_root);
    }

    /**
     * Perform a breadth-first traversal of the AVL Tree.
     *
     * @return array
     */
    public function breadthFirstTraversal(): array
    {
        return TreeTraversal::breadthFirst($this->_root);
    }

    /**
     * Check if the AVL Tree is balanced.
     * This method check balance starting from the root node directly
     *
     * @return bool
     */
    public function isBalanced(): bool
    {
        return $this->_isBalancedHelper($this->_root);
    }

    /**
     * Insert a node into the AVL Tree and balance the tree.
     *
     * @param ?AVLTreeNode $node  The current node.
     * @param mixed        $key   The key to insert.
     * @param mixed        $value The value to insert.
     *
     * @return AVLTreeNode The new root of the subtree.
     */
    private function _insertNode(
        ?AVLTreeNode $node,
        mixed $key,
        mixed $value
    ): AVLTreeNode {
        if (!$node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            return new AVLTreeNode($key, $value);
        }

        if ($key < $node->key) {
            $node->left = $this->_insertNode($node->left, $key, $value);
        } elseif ($key > $node->key) {
            $node->right = $this->_insertNode($node->right, $key, $value);
        } else {
            $node->value = $value; // Update existing value
        }

        $node->updateHeight();
        return $this->_balance($node);
    }

    /**
     * Delete a node by its key and balance the tree.
     *
     * @param ?AVLTreeNode $node The current node.
     * @param mixed        $key  The key of the node to delete.
     *
     * @return ?AVLTreeNode The new root of the subtree.
     */
    private function _deleteNode(?AVLTreeNode $node, mixed $key): ?AVLTreeNode
    {
        if (!$node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            return null;
        }

        if ($key < $node->key) {
            $node->left = $this->_deleteNode($node->left, $key);
        } elseif ($key > $node->key) {
            $node->right = $this->_deleteNode($node->right, $key);
        } else {
            if (!$node->left instanceof \DataStructures\AVLTree\AVLTreeNode) {
                return $node->right;
            }

            if (!$node->right instanceof \DataStructures\AVLTree\AVLTreeNode) {
                return $node->left;
            }

            $minNode = $this->_getMinNode($node->right);
            $node->key = $minNode->key;
            $node->value = $minNode->value;
            $node->right = $this->_deleteNode($node->right, $minNode->key);
        }

        $node->updateHeight();
        return $this->_balance($node);
    }

    /**
     * Search for a node by its key.
     *
     * @param ?AVLTreeNode $node The current node.
     * @param mixed        $key  The key to search for.
     *
     * @return ?AVLTreeNode The node with the specified key, or null if not found.
     */
    private function _searchNode(?AVLTreeNode $node, mixed $key): ?AVLTreeNode
    {
        if (!$node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            return null;
        }
        if ($key < $node->key) {
            return $this->_searchNode($node->left, $key);
        }

        if ($key > $node->key) {
            return $this->_searchNode($node->right, $key);
        } else {
            return $node;
        }
    }

    /**
     * Helper method to check if a subtree is balanced.
     *
     * @param ?AVLTreeNode $node The current node.
     *
     * @return bool True if the subtree is balanced, false otherwise.
     */
    private function _isBalancedHelper(?AVLTreeNode $node): bool
    {
        if (!$node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            return true;
        }

        $leftHeight = $node->left instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $node->left->height
            : 0;
        $rightHeight = $node->right instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $node->right->height
            : 0;

        $balanceFactor = abs($leftHeight - $rightHeight);
        if ($balanceFactor > 1) {
            return false;
        }

        return $this->_isBalancedHelper($node->left) && $this->_isBalancedHelper(
            $node->right
        );
    }

    /**
     * Balance the subtree rooted at the given node.
     *
     * @param ?AVLTreeNode $node The current node.
     *
     * @return ?AVLTreeNode The new root of the subtree.
     */
    private function _balance(?AVLTreeNode $node): ?AVLTreeNode
    {
        if ($node->balanceFactor() > 1) {
            if ($node->left && $node->left->balanceFactor() < 0) {
                $node->left = $this->_rotateLeft($node->left);
            }

            return $this->_rotateRight($node);
        }

        if ($node->balanceFactor() < -1) {
            if ($node->right && $node->right->balanceFactor() > 0) {
                $node->right = $this->_rotateRight($node->right);
            }

            return $this->_rotateLeft($node);
        }

        return $node;
    }

    /**
     * Perform a left rotation on the given node.
     *
     * @param AVLTreeNode $node The node to rotate.
     *
     * @return AVLTreeNode The new root of the rotated subtree.
     */
    private function _rotateLeft(AVLTreeNode $node): AVLTreeNode
    {
        $newRoot = $node->right;
        $node->right = $newRoot->left;
        $newRoot->left = $node;

        $node->updateHeight();
        $newRoot->updateHeight();

        return $newRoot;
    }

    /**
     * Perform a right rotation on the given node.
     *
     * @param AVLTreeNode $node The node to rotate.
     *
     * @return AVLTreeNode The new root of the rotated subtree.
     */
    private function _rotateRight(AVLTreeNode $node): AVLTreeNode
    {
        $newRoot = $node->left;
        $node->left = $newRoot->right;
        $newRoot->right = $node;

        $node->updateHeight();
        $newRoot->updateHeight();

        return $newRoot;
    }

    /**
     * Get the node with the minimum key in the given subtree.
     *
     * @param AVLTreeNode $node The root of the subtree.
     *
     * @return AVLTreeNode The node with the minimum key.
     */
    private function _getMinNode(AVLTreeNode $node): AVLTreeNode
    {
        while ($node->left instanceof \DataStructures\AVLTree\AVLTreeNode) {
            $node = $node->left;
        }

        return $node;
    }

    /**
     * Serializes the segment tree into a JSON string.
     *
     * @return string The serialized AVL Tree as a JSON string.
     */
    public function serialize(): string
    {
        return json_encode($this->_serializeTree($this->_root));
    }

    /**
     * Recursively serializes the AVL Tree.
     *
     * @param ?AVLTreeNode $node The node.
     *
     * @return array
     */
    private function _serializeTree(?AVLTreeNode $node): array
    {
        if (!$node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            return [];
        }

        return [
            'key' => $node->key,
            'value' => $node->value,
            'left' => $this->_serializeTree($node->left),
            'right' => $this->_serializeTree($node->right),
            'height' => $node->height,
        ];
    }

    /**
     * Deserializes a JSON string into an AVL Tree object
     *
     * @param string $data The JSON representation of an AVL Tree to deserialize.
     *
     * @return void
     */
    public function deserialize(string $data): void
    {
        $this->_root = $this->_deserializeTree(json_decode($data, true));
        $this->_counter = 0;
        $this->_updateNodeCount($this->_root);
    }

    /**
     * Recursively deserializes an AVL Tree from an array representation.
     *
     * @param array $data The serialized data for the node.
     *
     * @return AVLTreeNode|null The root node of the deserialized tree.
     */
    private function _deserializeTree(array $data): ?AVLTreeNode
    {
        if ($data === []) {
            return null;
        }

        $node = new AVLTreeNode($data['key'], $data['value']);
        $node->height = $data['height'];

        $node->left = $this->_deserializeTree($data['left']);
        $node->right = $this->_deserializeTree($data['right']);

        return $node;
    }

    /**
     * Updates the deserialized tree size.
     *
     * @param AVLTreeNode|null $node The root node of the deserialized tree.
     *
     * @return void
     */
    private function _updateNodeCount(?AVLTreeNode $node): void
    {
        if ($node instanceof \DataStructures\AVLTree\AVLTreeNode) {
            $this->_counter++;
            $this->_updateNodeCount($node->left);
            $this->_updateNodeCount($node->right);
        }
    }
}
