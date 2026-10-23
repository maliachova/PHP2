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
    private array $elements = [];

    private int $count = 0;

    private int $lowestCount = 0;

    /**
     * Enqueue.
     *
     * @param mixed $element The element.
     *
     * @return void
     */
    public function enqueue($element): void
    {
        $this->elements[$this->count] = $element;
        $this->count++;
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

        $element = $this->elements[$this->lowestCount];

        unset($this->elements[$this->lowestCount]);

        $this->lowestCount++;

        return $element;
    }

    /**
     * Is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->count - $this->lowestCount === 0;
    }

    /**
     * Size.
     *
     * @return int
     */
    public function size(): int
    {
        return $this->count - $this->lowestCount;
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

        return $this->elements[$this->lowestCount];
    }

    /**
     * Clear.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->elements = [];
        $this->count = 0;
        $this->lowestCount = 0;
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

        $result = (string) $this->elements[$this->lowestCount];

        for ($i = $this->lowestCount + 1; $i < $this->count; $i++) {
            $result .= $delimiter . $this->elements[$i];
        }

        return $result;
    }
}
