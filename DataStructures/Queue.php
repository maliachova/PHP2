<?php

/**
 * Queue.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Queue Data Structure - FIFO (First In, First Out)
 */
class Queue
{
    private array $_elements = [];

    private int $_count = 0;

    private int $_lowestCount = 0;

    /**
     * Enqueue.
     *
     * @param mixed $element The element.
     *
     * @return void
     */
    public function enqueue($element): void
    {
        $this->_elements[$this->_count] = $element;
        $this->_count++;
    }

    /**
     * Dequeue.
     *
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $element = $this->_elements[$this->_lowestCount];

        unset($this->_elements[$this->_lowestCount]);

        $this->_lowestCount++;

        return $element;
    }

    /**
     * Is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->_count - $this->_lowestCount === 0;
    }

    /**
     * Size.
     *
     * @return int
     */
    public function size(): int
    {
        return $this->_count - $this->_lowestCount;
    }

    /**
     * Peek.
     *
     * @return mixed
     */
    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->_elements[$this->_lowestCount];
    }

    /**
     * Clear.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->_elements = [];
        $this->_count = 0;
        $this->_lowestCount = 0;
    }

    /**
     * To string.
     *
     * @param string $delimiter The delimiter.
     *
     * @return string
     */
    public function toString(string $delimiter = ''): string
    {
        if ($this->isEmpty()) {
            return '';
        }

        $result = (string) $this->_elements[$this->_lowestCount];

        for ($i = $this->_lowestCount + 1; $i < $this->_count; $i++) {
            $result .= $delimiter . $this->_elements[$i];
        }

        return $result;
    }
}
