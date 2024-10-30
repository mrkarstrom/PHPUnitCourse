<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }


    // public static function setUpBeforeClass(): void
    // {
    //     $this->queue = new Queue;
    // }

    // public static function tearDownAfterClass(): void
    // {
    //     $this->queue = null;
    // }


    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('Testing');

        $this->assertEquals(1, $this->queue->getCount());
    }


    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('Testing');

        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('Testing', $item);
    }

    public function testAnItemIsRemovedFromFrontOfTheQueue()
    {
        $this->queue->push('Item1');
        $this->queue->push('Item2');

        $this->assertEquals('Item1', $this->queue->pop());
    }

    public function testMaximumNumberOfItemsThatCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testOneMoreThanMaximumNumberOfItemsThatCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->queue->push('One More Time');
    }
}
