<?php

/**
 * Singly linked list.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 *  Singly Linked List
 */
class SinglyLinkedList
{
    public ?SinglyLinkedList $next = null;

    /**
     * Construct.
     *
     * @param mixed $data
     */
    public function __construct(public $data)
    {
    }

    /**
     * Append.
     *
     * @param mixed $data
     *
     * @return void
     */
    public function append($data): void
    {
        $current = $this;
        while (
            $current instanceof SinglyLinkedList
            && $current->next instanceof \SinglyLinkedList
        ) {
            $current = $current->next;
        }

        $current->next = new SinglyLinkedList($data);
    }

    /**
     * Delete.
     *
     * @param mixed $data
     *
     * @return SinglyLinkedList
     */
    public function delete($data): SinglyLinkedList
    {
        $current = $this;
        if ($current->data == $data) {
            return $current->next;
        }

        while (
            $current instanceof SinglyLinkedList
            && $current->next instanceof \SinglyLinkedList
        ) {
            if ($current->next->data === $data) {
                $current->next = $current->next->next;
                return $this;
            }

            $current = $current->next;
        }

        return $this;
    }
}
