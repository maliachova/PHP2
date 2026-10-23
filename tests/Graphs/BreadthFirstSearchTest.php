<?php

/**
 * Test cases for breadth first search.
 *
 * PHP version 8.2
 *
 * @category Graphs
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Graphs/BreadthFirstSearch.php';

use PHPUnit\Framework\TestCase;

/**
 * Test cases for breadth first search.
 */
class BreadthFirstSearchTest extends TestCase
{
    /**
     * Test breadth first search.
     *
     * @return mixed
     */
    public function testBreadthFirstSearch()
    {
        $graph = array(
            "A" => ["B", "C", "D"],
            "B" => ["A", "D", "E"],
            "C" => ["A", "F"],
            "D" => ["B", "D"],
            "E" => ["B", "F"],
            "F" => ["C", "E", "G"],
            "G" => ["F"],
        );
        $ans = bfs($graph, "A", "F");
        $this->assertTrue($ans);
    }
    /**
     * Test breadth first search2.
     *
     * @return mixed
     */
    public function testBreadthFirstSearch2()
    {
        $graph = array(
            [1, 2],
            [2],
            [0, 3],
            [3],
        );

        $ans2 = bfs($graph, 3, 0);
        $this->assertFalse($ans2);
    }
    /**
     * Test breadth first search3.
     *
     * @return mixed
     */
    public function testBreadthFirstSearch3()
    {
        $graph = array(
            [2, 3, 1],
            [0],
            [0, 4],
            [0],
            [2],
        );
        $ans = bfs($graph, 0, 3);
        $this->assertTrue($ans);
    }
}
