<?php

/**
 * Avl tree node.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request:
 * #163
 * https://github.com/TheAlgorithms/PHP/pull/163
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\AVLTree;

/**
 * Avl tree node class.
 */
class AVLTreeNode
{
    public int $height = 1;

    /**
     * Construct.
     *
     * @param int|string $key
     * @param mixed $value
     * @param ?AVLTreeNode $left
     * @param ?AVLTreeNode $right
     */
    public function __construct(
        public $key,
        public mixed $value,
        public ?AVLTreeNode $left = null,
        public ?AVLTreeNode $right = null
    ) {
        // New node is initially at height 1
    }

    /**
     * Update height.
     *
     * @return void
     */
    public function updateHeight(): void
    {
        $leftHeight = $this->left instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $this->left->height
            : 0;
        $rightHeight = $this->right instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $this->right->height
            : 0;
        $this->height = max($leftHeight, $rightHeight) + 1;
    }

    /**
     * Balance factor.
     *
     * @return int
     */
    public function balanceFactor(): int
    {
        $leftHeight = $this->left instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $this->left->height
            : 0;
        $rightHeight = $this->right instanceof \DataStructures\AVLTree\AVLTreeNode
            ? $this->right->height
            : 0;
        return $leftHeight - $rightHeight;
    }
}
