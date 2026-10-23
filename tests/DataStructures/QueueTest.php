<?php

/**
 * Test cases for queue.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../../DataStructures/Queue.php";

/**
 * Test cases for queue.
 */
class QueueTest extends TestCase
{
    /**
     * Should add element to queue.
     *
     * @test
     *
     * @return void
     */
    public function shouldAddElementToQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(3, $queue->size());
        $this->assertEquals(1, $queue->peek());
    }

    /**
     * Should remove element from queue.
     *
     * @test
     *
     * @return void
     */
    public function shouldRemoveElementFromQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->peek());
        $this->assertEquals(2, $queue->size());
    }

    /**
     * Should return correct value when dequeue.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnCorrectValueWhenDequeue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->dequeue());
        $this->assertEquals(2, $queue->dequeue());
        $this->assertEquals(3, $queue->dequeue());
    }

    /**
     * Should return null when dequeue empty queue.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnNullWhenDequeueEmptyQueue(): void
    {
        $queue = new Queue();

        $this->assertNull($queue->dequeue());
    }

    /**
     * Should return true if queue is empty.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnTrueIfQueueIsEmpty(): void
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());
    }

    /**
     * Should return false if queue is not empty.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnFalseIfQueueIsNotEmpty(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);

        $this->assertFalse($queue->isEmpty());
    }

    /**
     * Should return queue size.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnQueueSize(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(3, $queue->size());
        $this->assertEquals(1, $queue->peek());
    }

    /**
     * Should return front element.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnFrontElement(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertEquals(1, $queue->peek());
        $this->assertEquals(3, $queue->size());
    }

    /**
     * Should return null when peek empty queue.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnNullWhenPeekEmptyQueue(): void
    {
        $queue = new Queue();

        $this->assertNull($queue->peek());
    }

    /**
     * Should clear queue.
     *
     * @test
     *
     * @return void
     */
    public function shouldClearQueue(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $queue->clear();

        $this->assertTrue($queue->isEmpty());
        $this->assertEquals(0, $queue->size());
        $this->assertNull($queue->peek());
    }

    /**
     * Should return string representation.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnStringRepresentation(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);

        $this->assertIsString($queue->toString());
        $this->assertEquals("1, 2, 3", $queue->toString(', '));
    }

    /**
     * Should return string representation for single element.
     *
     * @test
     *
     * @return void
     */
    public function shouldReturnStringRepresentationForSingleElement(): void
    {
        $queue = new Queue();
        $queue->enqueue(42);

        $this->assertSame('42', $queue->toString(', '));
    }
}
