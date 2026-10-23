<?php

/**
 * Linked list item.
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
 * Linked list item class.
 */
class LinkedListItem
{
    private ?LinkedListItem $next = null;

    private ?LinkedListItem $prev = null;

    private $value;

    /**
     * Set next.
     *
     * @param ?LinkedListItem $next
     *
     * @return static
     */
    public function setNext(?LinkedListItem $next): static
    {
        $this->next = $next;
        return $this;
    }

    /**
     * Get next.
     *
     * @return ?LinkedListItem
     */
    public function getNext(): ?LinkedListItem
    {
        return $this->next;
    }

    /**
     * Set prev.
     *
     * @param ?LinkedListItem $prev
     *
     * @return static
     */
    public function setPrev(?LinkedListItem $prev): static
    {
        $this->prev = $prev;
        return $this;
    }

    /**
     * Get prev.
     *
     * @return ?LinkedListItem
     */
    public function getPrev(): ?LinkedListItem
    {
        return $this->prev;
    }

    /**
     * Set value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function setValue($value): static
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
