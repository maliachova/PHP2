<?php

/**
 * Stack.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/**
 * Stack Implementation in PHP
 */
class Stack implements \Stringable
{
    /**
     * Construct.
     *
     * @param array $stack
     */
    public function __construct(private array $stack = [])
    {
    }

    /**
     * Destruct.
     */
    public function __destruct()
    {
        unset($this->stack);
    }


    /**
     * Push.
     *
     * @param mixed $data
     *
     * @return void
     */
    public function push($data): void
    {
        $this->stack[] = $data;
    }

    /**
     * Pop.
     *
     * @return mixed
     */
    public function pop(): mixed
    {
        return array_pop($this->stack);
    }

    /**
     * Peek.
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->stack[count($this->stack) - 1];
    }

    /**
     * Is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->stack === [];
    }

    /**
     * Print.
     *
     * @return void
     */
    public function print(): void
    {
        echo implode(', ', $this->stack);
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return implode(', ', $this->stack);
    }

    /**
     * Length.
     *
     * @return int
     */
    public function length(): int
    {
        return count($this->stack);
    }

    /**
     * Clear.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->stack = [];
    }

    /**
     * Search.
     *
     * @param mixed $data
     *
     * @return int|false
     */
    public function search($data): int|false
    {
        return array_search($data, $this->stack, true);
    }

    /**
     * To array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->stack;
    }

    /**
     * From array.
     *
     * @param array $array
     *
     * @return void
     */
    public function fromArray(array $array): void
    {
        $this->stack = $array;
    }

    /**
     * Reverse.
     *
     * @return void
     */
    public function reverse(): void
    {
        $this->stack = array_reverse($this->stack);
    }

    /**
     * Sort.
     *
     * @return void
     */
    public function sort(): void
    {
        sort($this->stack);
    }
}
