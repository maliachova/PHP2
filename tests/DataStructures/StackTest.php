<?php

/**
 * Test cases for stack.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/Stack.php';

/**
 * Test cases for stack.
 */
class StackTest extends TestCase
{
    /**
     * Test construct.
     *
     * @return mixed
     */
    public function testConstruct()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    /**
     * Test destruct.
     *
     * @return mixed
     */
    public function testDestruct()
    {
        $stack = new Stack([1, 2, 3]);
        unset($stack);
        $this->expectNotToPerformAssertions();
    }

    /**
     * Test push.
     *
     * @return mixed
     */
    public function testPush()
    {
        $stack = new Stack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    /**
     * Test pop.
     *
     * @return mixed
     */
    public function testPop()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals([1, 2], $stack->toArray());
    }

    /**
     * Test peek.
     *
     * @return mixed
     */
    public function testPeek()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->peek());
    }

    /**
     * Test is empty.
     *
     * @return mixed
     */
    public function testIsEmpty()
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
    }

    /**
     * Test print.
     *
     * @return mixed
     */
    public function testPrint()
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        $stack->print();
    }

    /**
     * Test to string.
     *
     * @return mixed
     */
    public function testToString()
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectOutputString("1, 2, 3");
        echo $stack;
    }

    /**
     * Test length.
     *
     * @return mixed
     */
    public function testLength()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->length());
    }

    /**
     * Test clear.
     *
     * @return mixed
     */
    public function testClear()
    {
        $stack = new Stack([1, 2, 3]);
        $stack->clear();
        $this->assertEquals([], $stack->toArray());
    }

    /**
     * Test search.
     *
     * @return mixed
     */
    public function testSearch()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(2, $stack->search(3));
    }

    /**
     * Test search returns false when missing.
     *
     * @return mixed
     */
    public function testSearchReturnsFalseWhenMissing()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertFalse($stack->search(99));
    }

    /**
     * Test to array.
     *
     * @return mixed
     */
    public function testToArray()
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    /**
     * Test from array.
     *
     * @return mixed
     */
    public function testFromArray()
    {
        $stack = new Stack();
        $stack->fromArray([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }

    /**
     * Test reverse.
     *
     * @return mixed
     */
    public function testReverse()
    {
        $stack = new Stack([1, 2, 3]);
        $stack->reverse();
        $this->assertEquals([3, 2, 1], $stack->toArray());
    }

    /**
     * Test sort.
     *
     * @return mixed
     */
    public function testSort()
    {
        $stack = new Stack([3, 2, 1]);
        $stack->sort();
        $this->assertEquals([1, 2, 3], $stack->toArray());
    }
}
