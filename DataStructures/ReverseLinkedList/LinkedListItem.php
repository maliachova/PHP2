<?php

/**
 * Linked list item.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace DataStructures\ReverseLinkedList;

/**
 * Linked list item class.
 */
class LinkedListItem
{
    private ?LinkedListItem $_next = null;

    private ?LinkedListItem $_prev = null;

    private $_value;

    /**
     * Set next.
     *
     * @param ?LinkedListItem $next The next.
     *
     * @return static
     */
    public function setNext(?LinkedListItem $next): static
    {
        $this->_next = $next;
        return $this;
    }

    /**
     * Get next.
     *
     * @return ?LinkedListItem
     */
    public function getNext(): ?LinkedListItem
    {
        return $this->_next;
    }

    /**
     * Set prev.
     *
     * @param ?LinkedListItem $prev The prev.
     *
     * @return static
     */
    public function setPrev(?LinkedListItem $prev): static
    {
        $this->_prev = $prev;
        return $this;
    }

    /**
     * Get prev.
     *
     * @return ?LinkedListItem
     */
    public function getPrev(): ?LinkedListItem
    {
        return $this->_prev;
    }

    /**
     * Set value.
     *
     * @param mixed $value The value.
     *
     * @return static
     */
    public function setValue($value): static
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Get value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }
}
