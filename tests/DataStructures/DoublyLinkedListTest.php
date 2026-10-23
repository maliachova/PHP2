<?php

/**
 * Test cases for doubly linked list.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/DoublyLinkedList.php';

/**
 * Tests for the Doubly Linked Lists class
 */

class DoublyLinkedListTest extends TestCase
{
    /**
     * Constructor test
     *
     * @return mixed
     */
    public function testConstructor()
    {
        $list = new DoublyLinkedList();
        $this->assertEquals(0, $list->length());
    }

    /**
     * Test for the append method
     *
     * @return mixed
     */
    public function testAppend()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals(3, $list->length());
    }

    /**
     * Test for the insert method
     *
     * @return mixed
     */
    public function testInsert()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->insert(1, 4);
        $this->assertEquals(4, $list->length());
    }

    /**
     * Test for the delete method
     *
     * @return mixed
     */
    public function testDelete()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->delete(1);
        $this->assertEquals(2, $list->length());
    }

    /**
     * Test for the deleteAt method
     *
     * @return mixed
     */
    public function testDeleteAt()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->deleteAt(1);
        $this->assertEquals(2, $list->length());
    }

    /**
     * Test for printList method
     *
     * @return mixed
     */
    public function testPrintList()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("1\n2\n3\n");
        $list->printList();
    }

    /**
     * Test for the printListReverse method
     *
     * @return mixed
     */
    public function testPrintListReverse()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("3\n2\n1\n");
        $list->printListReverse();
    }

    /**
     * Test for the reverse method
     *
     * @return mixed
     */
    public function testReverse()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $list->reverse();
        $this->expectOutputString("3\n2\n1\n");
        $list->printList();
    }

    /**
     * Test for the length method
     *
     * @return mixed
     */
    public function testLength()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals(3, $list->length());
    }
    /**
     * Test for the Search method
     *
     * @return mixed
     */
    public function testSearch()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $searchItem = $list->search(2);
        $this->assertEquals(2, $searchItem->data);
    }

    /**
     * Test for the isEmpty method
     *
     * @return mixed
     */
    public function testIsEmpty()
    {
        $list = new DoublyLinkedList();
        $this->assertEquals(true, $list->isEmpty());
    }

    /**
     * Test for __toString method
     *
     * @return mixed
     */
    public function testToString()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->expectOutputString("1, 2, 3");
        echo $list;
    }

    /**
     * Test for the toArray method
     *
     * @return mixed
     */
    public function testToArray()
    {
        $list = new DoublyLinkedList();
        $list->append(1);
        $list->append(2);
        $list->append(3);
        $this->assertEquals([1,2,3], $list->toArray());
    }
}
