<?php

/**
 * Test cases for bs tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request:
 * #174
 * https://github.com/TheAlgorithms/PHP/pull/174
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/BinarySearchTree/BSTree.php';
require_once __DIR__ . '/../../DataStructures/BinarySearchTree/BSTNode.php';
require_once __DIR__
    . '/../../DataStructures/BinarySearchTree/DuplicateKeyException.php';

use DataStructures\BinarySearchTree\BSTree;
use DataStructures\BinarySearchTree\DuplicateKeyException;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for bs tree.
 */
class BSTreeTest extends TestCase
{
    private BSTree $_tree;


    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        // Initialize an empty tree before each test
        $this->_tree = new BSTree();
    }

    /**
     * Test tree initialization.
     *
     * @return mixed
     */
    public function testTreeInitialization()
    {
        $this->assertNull(
            $this->_tree->getRoot(),
            "Tree root should be null upon initialization."
        );
        $this->assertEquals(
            0,
            $this->_tree->size(),
            "Tree size should be 0 upon initialization."
        );
        $this->assertTrue(
            $this->_tree->isEmpty(),
            "Tree should be empty upon initialization."
        );
    }

    /**
     * Test: Insert a single node
     *
     * @return void
     */
    public function testInsertSingleNode(): void
    {
        $this->_tree->insert(10, 'value10');
        $this->assertNotNull(
            $this->_tree->getRoot(),
            "Tree root should not be null after inserting."
        );
        $this->assertEquals(
            10,
            $this->_tree->getRoot()->key,
            "Node key does not match the key inserted in node"
        );
        $this->assertEquals(
            'value10',
            $this->_tree->getRoot()->value,
            "Node value does not match the value inserted in node"
        );
    }

    /**
     * Test: Insert multiple nodes and validate small structure
     *
     * @return void
     */
    public function testInsertMultipleNodes(): void
    {
        $this->_tree->insert(20, 'value20');
        $this->_tree->insert(10, 'value10');
        $this->_tree->insert(30, 'value30');

        $this->assertEquals(
            20,
            $this->_tree->getRoot()->key,
            "Root node was not set properly."
        );
        $this->assertEquals(
            10,
            $this->_tree->getRoot()->left->key,
            "Left node was not inserted properly"
        );
        $this->assertEquals(
            30,
            $this->_tree->getRoot()->right->key,
            "Right node was not inserted properly"
        );
    }

    /**
     * Test: Insert multiple nodes from array and validate structure
     *
     * @return mixed
     */
    public function testInsertMultipleNodesFromArray()
    {
        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360",
            230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50",
            28 => "Value 28", 164 => "Value 164",
            321 => "Value 321", 40 => "Value 40", 9 => "Value 9", 32 => "Value 32",
            64 => "Value 64",
        ];

        $bsTree = new BSTree($arrayData);
        $root = $bsTree->getRoot();

        $this->assertFalse($bsTree->isEmpty(), "Tree was not populated correctly");
        $this->assertSame(
            count($arrayData),
            $bsTree->size(),
            "Failed to insert all " . count($arrayData) . " nodes"
        );

        $this->assertEquals(
            200,
            $root->key,
            "The root should be the first inserted node"
        );
        $this->assertEquals(
            "Value 200",
            $root->value,
            "The value of the new root must match the first inserted node"
        );
    }

    /**
     * Test: Duplicate key insertion should throw an exception
     *
     * @return void
     */
    public function testInsertDuplicateKey(): void
    {
        $this->_tree->insert(15, 'value15');
        $this->expectException(DuplicateKeyException::class);
        $this->_tree->insert(15, 'valueNew');
    }

    /**
     * Checks the empty state of the tree before and after insertions.
     *
     * @return mixed
     */
    public function testIsEmpty()
    {
        $this->assertTrue($this->_tree->isEmpty(), "Tree should be empty.");
        $this->_tree->insert(120, "Value 120");
        $this->assertFalse($this->_tree->isEmpty(), "Tree should not be empty.");
    }

    /**
     * Helper to populate the initialized tree for further tests
     *
     * The structure of the Binary Search Tree (BST) after insertion:
     * *
     * *                           200
     * *                       /          \
     * *                    150             250
     * *                  /    \           /    \
     * *               140    170         220    300
     * *              /       /  \      /    \      \
     * *           130     160   180   215   230     360
     * *          /                 \       /   \
     * *       110                  185    225   240
     * *       /   \
     * *     50    115
     * *    /
     * *  70
     *
     * @return void
     */
    private function _populateTree(): void
    {
        $this->_tree->insert(200, "Value 200");
        $this->_tree->insert(150, "Value 150");
        $this->_tree->insert(250, "Value 250");
        $this->_tree->insert(170, "Value 170");
        $this->_tree->insert(140, "Value 140");
        $this->_tree->insert(130, "Value 130");
        $this->_tree->insert(110, "Value 110");
        $this->_tree->insert(115, "Value 115");
        $this->_tree->insert(160, "Value 160");
        $this->_tree->insert(180, "Value 180");
        $this->_tree->insert(185, "Value 185");
        $this->_tree->insert(220, "Value 220");
        $this->_tree->insert(230, "Value 230");
        $this->_tree->insert(300, "Value 300");
        $this->_tree->insert(360, "Value 360");
        $this->_tree->insert(215, "Value 215");
        $this->_tree->insert(240, "Value 240");
        $this->_tree->insert(225, "Value 225");
        $this->_tree->insert(50, "Value 50");
        $this->_tree->insert(70, "Value 70");
    }

    /**
     * Test: Search for an existing node
     *
     * @return void
     */
    public function testSearchNodeExists(): void
    {
        $this->_populateTree();
        $node = $this->_tree->search(115);
        $isFound = $this->_tree->isFound($this->_tree->getRoot(), 230);

        $this->assertNotNull(
            $node,
            "The node with key 115 exists. Should not be null."
        );
        $this->assertEquals(115, $node->key, "The node key does not match");
        $this->assertEquals(
            'Value 115',
            $node->value,
            "The node value does not match"
        );
        $this->assertTrue($isFound, "Node with key 230 exists.");
    }

    /**
     * Test: Search for a non-existing node
     *
     * @return void
     */
    public function testSearchNodeNotExists(): void
    {
        $this->_populateTree();

        $node = $this->_tree->search(444);
        $isFound = $this->_tree->isFound($this->_tree->getRoot(), 1500);

        $this->assertNull($node, "Node with key 444 does not exist");
        $this->assertFalse($isFound, "Node with key 1500  does not exist.");
    }

    /**
     * Test: Remove a leaf node
     *
     * @return void
     */
    public function testRemoveLeafNode(): void
    {
        $this->_populateTree();

        $this->assertTrue(
            $this->_tree->search(360)->isLeaf(),
            "The node with key 360 is leaf."
        );
        $parentNode = $this->_tree->search(360)->parent->key;    // 300

        $removedNode = $this->_tree->remove(360);
        $this->assertNull(
            $this->_tree->search(360),
            "Node with key 360 should be gone"
        );
        $this->assertNotNull(
            $this->_tree->search($parentNode),
            "Parent node with key 300 should still exist. Tree was not merged " .
            "correctly."
        );

        $this->assertEquals(
            360,
            $removedNode->key,
            "The key of the removed node does not match"
        );
        $this->assertEquals(
            'Value 360',
            $removedNode->value,
            "The value of the removed node does not match"
        );
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation " .
            "failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
    }

    /**
     * Test: Remove a node with one child
     *
     * @return void
     */
    public function testRemoveNodeWithOneChild(): void
    {
        $this->_populateTree();

        $this->assertEquals(
            1,
            $this->_tree->search(140)->getChildrenCount(),
            "The node with key 140 has one child."
        );
        $parentNode = $this->_tree->search(140)->parent->key;    // 150
        $leftNode = $this->_tree->search(140)->left->key;    // 130

        $removedNode = $this->_tree->remove(140);
        $this->assertNull(
            $this->_tree->search(140),
            "Node with key 140 should be gone"
        );
        $this->assertNotNull(
            $this->_tree->search($parentNode),
            "Parent node with key 150 should still exist. Tree was not merged " .
            "correctly."
        );
        $this->assertNotNull(
            $this->_tree->search($leftNode),
            "Left Node with key 130 should still exist. Tree was not merged " .
            "correctly."
        );

        $this->assertEquals(
            140,
            $removedNode->key,
            "The key of the removed node does not match"
        );
        $this->assertEquals(
            'Value 140',
            $removedNode->value,
            "The value of the removed node does not match"
        );
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation " .
            "failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
    }

    /**
     * Test: Remove a node with two children
     *
     * @return void
     */
    public function testRemoveNodeWithTwoChildren(): void
    {
        $this->_populateTree();

        $this->assertEquals(
            2,
            $this->_tree->search(230)->getChildrenCount(),
            "The node with key 230 has two children."
        );

        $parentNode = $this->_tree->search(230)->parent->key;    // 220
        $leftNode = $this->_tree->search(230)->left->key;     // 225
        $rightNode = $this->_tree->search(230)->right->key;   // 240

        $removedNode = $this->_tree->remove(230);
        $this->assertNull(
            $this->_tree->search(230),
            "Node with key 230 should be gone"
        );
        $this->assertNotNull(
            $this->_tree->search($parentNode),
            "Parent Node with key 220 should still exist. Tree was not merged " .
            "correctly."
        );
        $this->assertNotNull(
            $this->_tree->search($leftNode),
            "Left Node with key 225 should still exist. Tree was not merged " .
            "correctly."
        );
        $this->assertNotNull(
            $this->_tree->search($rightNode),
            "Parent Node with key 240 should still exist. Tree was not merged " .
            "correctly."
        );

        $this->assertEquals(
            230,
            $removedNode->key,
            "The key of the removed node does not match"
        );
        $this->assertEquals(
            'Value 230',
            $removedNode->value,
            "The value of the removed node does not match"
        );
        $this->assertNull(
            $removedNode->left,
            "The left pointer was not broken from tree correctly. Node isolation " .
            "failed."
        );
        $this->assertNull(
            $removedNode->right,
            "The right pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
        $this->assertNull(
            $removedNode->parent,
            "The parent pointer was not broken from tree correctly. Node " .
            "isolation failed."
        );
    }

    /**
     * Test remove non existing node.
     *
     * @return void
     */
    public function testRemoveNonExistingNode(): void
    {
        $this->_populateTree();
        $removedNode = $this->_tree->remove(3333);
        $this->assertNull($removedNode, "Node not found, Null should be returned.");
    }

    /**
     * Test: Verify all operations on a large tree.
     *
     * @return void
     */
    public function testOperationsOnLargeTree(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            $this->_tree->insert($i, "Value $i");
        }

        for ($i = 1; $i <= 1000; $i++) {
            $this->assertEquals(
                "Value $i",
                $this->_tree->search($i)->value,
                "Value for key $i should be 'Value $i'"
            );
        }

        for ($i = 1; $i <= 1000; $i++) {
            $this->assertTrue(
                $this->_tree->isFound($this->_tree->getRoot(), $i),
                "Node with key $i should exist"
            );
        }

        for ($i = 1; $i <= 5; $i++) {
            $this->_tree->remove($i);
            $this->assertFalse(
                $this->_tree->isFound($this->_tree->getRoot(), $i),
                "Value for key $i should be not exist after deletion"
            );
        }
    }

    /**
     * Test: Check tree size
     *
     * @return void
     */
    public function testTreeSize(): void
    {
        $this->assertEquals(0, $this->_tree->size());

        $arrayData = [200 => "Value 200", 150 => "Value 150", 170 => "Value 170",
            250 => "Value 250", 300 => "Value 300", 360 => "Value 360",
            230 => "Value 230",
            240 => "Value 240", 220 => "Value 220", 50 => "Value 50",
            28 => "Value 28",
            164 => "Value 164", 321 => "Value 321", 40 => "Value 40", 9 => "Value 9",
            32 => "Value 32", 64 => "Value 64", 116 => "Value 116"
        ];

        $bsTree = new BSTree($arrayData);
        $this->assertEquals(
            count($arrayData),
            $bsTree->size(),
            "Tree size should be size of array. Failed to insert all nodes."
        );
    }

    /**
     * Test depth for various nodes
     *
     * @return void
     */
    public function testGetDepth(): void
    {
        $this->_populateTree();

        $root = $this->_tree->getRoot();

        $node150 = $this->_tree->search(150);
        $node110 = $this->_tree->search(110);
        $node70 = $this->_tree->search(70);

        $this->assertEquals(
            0,
            $this->_tree->getdepth($root),
            "The root node should have a depth of 0."
        );
        $this->assertEquals(
            1,
            $this->_tree->getdepth($node150),
            "Node 150 should have a depth of 1."
        );
        $this->assertEquals(
            4,
            $this->_tree->getdepth($node110),
            "Node 110 should have a depth of 4."
        );
        $this->assertEquals(
            6,
            $this->_tree->getdepth($node70),
            "Node 70 should have a depth of 6."
        );
    }

    /**
     * Test height for various nodes
     *
     * @return void
     */
    public function testGetHeight(): void
    {
        $this->_populateTree();

        $root = $this->_tree->getRoot();

        $node150 = $this->_tree->search(150);
        $node110 = $this->_tree->search(110);
        $node70 = $this->_tree->search(70);
        $node360 = $this->_tree->search(360);

        $this->assertEquals(
            6,
            $this->_tree->getheight($root),
            "The root node should have a height of 6."
        );
        $this->assertEquals(
            5,
            $this->_tree->getheight($node150),
            "Node 150 should have a height of 5."
        );
        $this->assertEquals(
            0,
            $this->_tree->getheight($node70),
            "Node 70 should have a height of 0 (it's a leaf)."
        );
        $this->assertEquals(
            0,
            $this->_tree->getheight($node360),
            "Node 360 should have a height of 0 (it's a leaf)."
        );
        $this->assertEquals(
            2,
            $this->_tree->getheight($node110),
            "Node 110 should have a height of 2."
        );
    }

    /**
     * Test: In-order traversal
     *
     * @return void
     */
    public function testInOrderTraversal(): void
    {
        $this->assertSame(
            $this->_getExpectedInOrder(),
            $this->_tree->inOrderTraversal(),
            "Did not match the expected inOrder nodes. Failed inOrder traversal."
        );
    }

    /**
     * Get expected in order.
     *
     * @return array
     */
    private function _getExpectedInOrder(): array
    {
        $this->_populateTree();

        return [
            50 => 'Value 50', 70 => 'Value 70', 110 => 'Value 110',
            115 => 'Value 115', 130 => 'Value 130', 140 => 'Value 140',
            150 => 'Value 150', 160 => 'Value 160', 170 => 'Value 170',
            180 => 'Value 180', 185 => 'Value 185', 200 => 'Value 200',
            215 => 'Value 215',
            220 => 'Value 220', 225 => 'Value 225', 230 => 'Value 230',
            240 => 'Value 240',
            250 => 'Value 250', 300 => 'Value 300', 360 => 'Value 360'
        ];
    }

    /**
     * Test: Pre-order traversal
     *
     * @return void
     */
    public function testPreOrderTraversal(): void
    {
        $this->assertSame(
            $this->_getExpectedPreOrder(),
            $this->_tree->preOrderTraversal(),
            "Did not match the expected preOrder nodes. Failed preOrder traversal."
        );
    }

    /**
     * Get expected pre order.
     *
     * @return array
     */
    private function _getExpectedPreOrder(): array
    {
        $this->_populateTree();

        return [
            200 => 'Value 200', 150 => 'Value 150', 140 => 'Value 140',
            130 => 'Value 130', 110 => 'Value 110', 50 => 'Value 50',
            70 => 'Value 70', 115 => 'Value 115', 170 => 'Value 170',
            160 => 'Value 160', 180 => 'Value 180', 185 => 'Value 185',
            250 => 'Value 250',
            220 => 'Value 220', 215 => 'Value 215', 230 => 'Value 230',
            225 => 'Value 225',
            240 => 'Value 240', 300 => 'Value 300', 360 => 'Value 360'
        ];
    }

    /**
     * Test: Post-order traversal
     *
     * @return void
     */
    public function testPostOrderTraversal(): void
    {
        $this->assertSame(
            $this->_getExpectedPostOrder(),
            $this->_tree->postOrderTraversal(),
            "Did not match the expected postOrder nodes. Failed postOrder traversal."
        );
    }

    /**
     * Get expected post order.
     *
     * @return array
     */
    private function _getExpectedPostOrder(): array
    {
        $this->_populateTree();

        return [
            70 => 'Value 70', 50 => 'Value 50', 115 => 'Value 115',
            110 => 'Value 110', 130 => 'Value 130', 140 => 'Value 140',
            160 => 'Value 160', 185 => 'Value 185', 180 => 'Value 180',
            170 => 'Value 170', 150 => 'Value 150', 215 => 'Value 215',
            225 => 'Value 225',
            240 => 'Value 240', 230 => 'Value 230', 220 => 'Value 220',
            360 => 'Value 360',
            300 => 'Value 300', 250 => 'Value 250', 200 => 'Value 200'
        ];
    }

    /**
     * Test: Breadth-first traversal
     *
     * @return void
     */
    public function testBreadthFirstTraversal(): void
    {
        $this->assertSame(
            $this->_getExpectedBFT(),
            $this->_tree->breadthFirstTraversal(),
            "Did not match the expected breadth-first nodes. Failed BFT traversal."
        );
    }

    /**
     * Get expected bft.
     *
     * @return array
     */
    private function _getExpectedBFT(): array
    {
        $this->_populateTree();

        return [
            200 => 'Value 200', 150 => 'Value 150', 250 => 'Value 250',
            140 => 'Value 140', 170 => 'Value 170', 220 => 'Value 220',
            300 => 'Value 300', 130 => 'Value 130', 160 => 'Value 160',
            180 => 'Value 180', 215 => 'Value 215', 230 => 'Value 230',
            360 => 'Value 360',
            110 => 'Value 110', 185 => 'Value 185', 225 => 'Value 225',
            240 => 'Value 240',
            50 => 'Value 50', 115 => 'Value 115', 70 => 'Value 70'
        ];
    }

    /**
     * Test: Serialize and deserialize
     *
     * @return void
     */
    public function testSerializationAndDeserialization(): void
    {
        $this->_populateTree();

        $serializedData = $this->_tree->serialize();
        $deserializedTree = $this->_tree->deserialize($serializedData);

        $this->assertEquals(
            $this->_tree->inOrderTraversal(),
            $deserializedTree->inOrderTraversal(),
            "Deserialized tree should match the original tree."
        );
        $this->assertEquals(
            $this->_tree->size(),
            $deserializedTree->size(),
            "Deserialized tree size was not updated correctly."
        );
    }

    /**
     * Provides traversal types and expected results for the iterator test.
     *
     * @return array
     */
    public static function traversalProvider(): array
    {
        return [
            // Test case for In-Order traversal
            'InOrder' => [
                'traversalType' => 'inOrder',
                'expected' => [
                    50 => 'Value 50', 70 => 'Value 70', 110 => 'Value 110',
                    115 => 'Value 115', 130 => 'Value 130', 140 => 'Value 140',
                    150 => 'Value 150', 160 => 'Value 160', 170 => 'Value 170',
                    180 => 'Value 180', 185 => 'Value 185', 200 => 'Value 200',
                    215 => 'Value 215',
                    220 => 'Value 220', 225 => 'Value 225', 230 => 'Value 230',
                    240 => 'Value 240',
                    250 => 'Value 250', 300 => 'Value 300', 360 => 'Value 360',
                ],
            ],
            // Test case for Pre-Order traversal
            'PreOrder' => [
                'traversalType' => 'preOrder',
                'expected' => [
                    200 => 'Value 200', 150 => 'Value 150', 140 => 'Value 140',
                    130 => 'Value 130', 110 => 'Value 110', 50 => 'Value 50',
                    70 => 'Value 70', 115 => 'Value 115', 170 => 'Value 170',
                    160 => 'Value 160', 180 => 'Value 180', 185 => 'Value 185',
                    250 => 'Value 250',
                    220 => 'Value 220', 215 => 'Value 215', 230 => 'Value 230',
                    225 => 'Value 225',
                    240 => 'Value 240', 300 => 'Value 300', 360 => 'Value 360',
                ],
            ],
            // Test case for Post-Order traversal
            'PostOrder' => [
                'traversalType' => 'postOrder',
                'expected' => [
                    70 => 'Value 70', 50 => 'Value 50', 115 => 'Value 115',
                    110 => 'Value 110', 130 => 'Value 130', 140 => 'Value 140',
                    160 => 'Value 160', 185 => 'Value 185', 180 => 'Value 180',
                    170 => 'Value 170', 150 => 'Value 150', 215 => 'Value 215',
                    225 => 'Value 225',
                    240 => 'Value 240', 230 => 'Value 230', 220 => 'Value 220',
                    360 => 'Value 360',
                    300 => 'Value 300', 250 => 'Value 250', 200 => 'Value 200',
                ],
            ],
        ];
    }

    /**
     * Test: Iterating over the tree with inOrder, preOrder, and postOrder
     * Traversals.
     *
     * @dataProvider traversalProvider
     *
     * @param string $traversalType The traversal type.
     * @param array  $expected      The expected.
     *
     * @return void
     */
    public function testIteratorWithTraversalTypes(
        string $traversalType,
        array $expected
    ): void {
        $this->_tree->setTraversalType($traversalType);
        $this->_populateTree();

        $expectedKeys = array_keys($expected);
        $expectedValues = array_values($expected);

        $index = 0;

        foreach ($this->_tree as $node) {
            $this->assertEquals(
                $expectedKeys[$index],
                $node->key,
                "Did not match the expected $traversalType key. Failed tree " .
                "iteration."
            );
            $this->assertEquals(
                $expectedValues[$index],
                $node->value,
                "Did not match the expected $traversalType value. Failed tree " .
                "iteration."
            );
            $index++;
        }
        $this->assertEquals(
            count($expected),
            $index,
            "Tree iteration did not visit the expected number of nodes."
        );
    }
}
