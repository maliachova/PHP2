<?php

/**
 * Test cases for reverse linked list.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

namespace DataStructures;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/ReverseLinkedList/LinkedListItem.php';
require_once __DIR__
    . '/../../DataStructures/ReverseLinkedList/ReverseLinkedList.php';


use DataStructures\ReverseLinkedList\LinkedListItem;
use DataStructures\ReverseLinkedList\ReverseLinkedList;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for reverse linked list.
 */
class ReverseLinkedListTest extends TestCase
{
    /**
     * Test reverse linked list.
     *
     * @return mixed
     */
    public function testReverseLinkedList()
    {
        $list = [1,2,3,4,5];

        $firstItem = (new LinkedListItem())->setValue(0);

        $prevItem = $firstItem;

        foreach ($list as $value) {
            $item = new LinkedListItem();
            $item->setValue($value);
            $item->setPrev($prevItem);
            $prevItem->setNext($item);
            $prevItem = $item;
        }

        $newFirstItem = (new ReverseLinkedList())->reverse($firstItem);
        do {
            $this->assertEquals($newFirstItem->getValue(), array_pop($list));
        } while ($newFirstItem = $newFirstItem->getNext());
    }
}
