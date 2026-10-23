<?php

/**
 * Test cases for disjoint set.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request:
 * #160
 * https://github.com/TheAlgorithms/PHP/pull/160
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/DisjointSets/DisjointSet.php';
require_once __DIR__ . '/../../DataStructures/DisjointSets/DisjointSetNode.php';

use DataStructures\DisjointSets\DisjointSet;
use DataStructures\DisjointSets\DisjointSetNode;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for disjoint set.
 */
class DisjointSetTest extends TestCase
{
    private DisjointSet $_ds;
    private array $_nodes;

    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->_ds = new DisjointSet();
        $this->_nodes = [];

        // Create 20 nodes
        for ($i = 0; $i < 20; $i++) {
            $this->_nodes[$i] = new DisjointSetNode($i);
        }

        // Perform union operations to form several disjoint sets
        $this->_ds->unionSet($this->_nodes[0], $this->_nodes[1]);
        $this->_ds->unionSet($this->_nodes[1], $this->_nodes[2]);

        $this->_ds->unionSet($this->_nodes[3], $this->_nodes[4]);
        $this->_ds->unionSet($this->_nodes[4], $this->_nodes[5]);

        $this->_ds->unionSet($this->_nodes[6], $this->_nodes[7]);
        $this->_ds->unionSet($this->_nodes[7], $this->_nodes[8]);

        $this->_ds->unionSet($this->_nodes[9], $this->_nodes[10]);
        $this->_ds->unionSet($this->_nodes[10], $this->_nodes[11]);

        $this->_ds->unionSet($this->_nodes[12], $this->_nodes[13]);
        $this->_ds->unionSet($this->_nodes[13], $this->_nodes[14]);

        $this->_ds->unionSet($this->_nodes[15], $this->_nodes[16]);
        $this->_ds->unionSet($this->_nodes[16], $this->_nodes[17]);

        $this->_ds->unionSet($this->_nodes[18], $this->_nodes[19]);
    }

    /**
     * Test find set.
     *
     * @return void
     */
    public function testFindSet(): void
    {
        // Nodes in the same sets should have the same root
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 6; $j++) {
                $setI = $this->_ds->findSet($this->_nodes[$i]);
                $setJ = $this->_ds->findSet($this->_nodes[$j]);

                if ($this->_inSameSet($i, $j)) {
                    $this->assertSame(
                        $setI,
                        $setJ,
                        "Nodes $i and $j should be in the same set"
                    );
                } else {
                    $this->assertNotSame(
                        $setI,
                        $setJ,
                        "Nodes $i and $j should be in different sets"
                    );
                }
            }
        }
    }

    /**
     * In same set.
     *
     * @param int $i The i.
     * @param int $j The j.
     *
     * @return bool
     */
    private function _inSameSet(int $i, int $j): bool
    {
        // Define which nodes should be in the same set based on union operations
        $sets = [
            [0, 1, 2],      // Set A
            [3, 4, 5],      // Set B
            [6, 7, 8],      // Set C
            [9, 10, 11],    // Set D
            [12, 13, 14],   // Set E
            [15, 16, 17],   // Set F
            [18, 19]        // Set G
        ];

        foreach ($sets as $set) {
            if (in_array($i, $set) && in_array($j, $set)) {
                return true;
            }
        }

        return false;
    }
}
