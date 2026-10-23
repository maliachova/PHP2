<?php

/**
 * Test cases for invert binary tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/InvertBinaryTree/BinaryTree.php';
require_once __DIR__ . '/../../DataStructures/InvertBinaryTree/InvertBinaryTree.php';

use DataStructures\InvertBinaryTree\BinaryTree;
use DataStructures\InvertBinaryTree\InvertBinaryTree;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for invert binary tree.
 */
class InvertBinaryTreeTest extends TestCase
{
    /**
     * Test invert binary tree.
     *
     * @return mixed
     */
    public function testInvertBinaryTree()
    {
        $b = (new BinaryTree())->setValue(1);
        $bl = (new BinaryTree())->setValue(3);
        $b->setLeft($bl);
        $br = (new BinaryTree())->setValue(2);
        $b->setRight($br);
        $br->setLeft((new BinaryTree())->setValue(4));
        $br->setRight((new BinaryTree())->setValue(5));

        $expected = (new BinaryTree())->setValue(1);
        $expectedBr = (new BinaryTree())->setValue(3);
        $expected->setRight($expectedBr);
        $expectedBl = (new BinaryTree())->setValue(2);
        $expected->setLeft($expectedBl);
        $expectedBl->setRight((new BinaryTree())->setValue(4));
        $expectedBl->setLeft((new BinaryTree())->setValue(5));

        (new InvertBinaryTree())->invert($b);

        $this->assertEquals($expected, $b);
    }
}
