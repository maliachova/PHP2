<?php

/**
 * Invert binary tree.
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
 * Recurrent algorithm to invert binary tree (mirror)
 * (https://medium.com/@kvrware/inverting-binary-tree-b0ff3a5cb0df).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class InvertBinaryTree
{
    /**
     * Invert.
     *
     * @param ?BinaryTree $b
     *
     * @return void
     */
    public function invert(?BinaryTree $b): void
    {
        if (!$b instanceof \DataStructures\InvertBinaryTree\BinaryTree) {
            return;
        }

        $tmp = $b->getLeft();
        $b->setLeft($b->getRight());
        $b->setRight($tmp);
        $this->invert($b->getLeft());
        $this->invert($b->getRight());
    }
}
