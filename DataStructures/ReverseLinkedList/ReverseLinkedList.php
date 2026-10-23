<?php

/**
 * Reverse linked list.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\ReverseLinkedList;

/**
 * Reverse linked list
 * (https://en.wikipedia.org/wiki/Linked_list).
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class ReverseLinkedList
{
    /**
     * Reverse.
     *
     * @param LinkedListItem $item
     *
     * @return LinkedListItem
     */
    public function reverse(LinkedListItem $item): LinkedListItem
    {
        $next = $item->getNext();
        $item->setNext(null);
        while (true) {
            $item->setPrev($next);
            if (!$next instanceof \DataStructures\ReverseLinkedList\LinkedListItem) {
                return $item;
            }

            $nextNext = $next->getNext();
            $next->setNext($item);
            $item = $next;
            $next = $nextNext;
        }
    }
}
