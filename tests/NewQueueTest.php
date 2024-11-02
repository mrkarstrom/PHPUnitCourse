<?php

use PHPUnit\Framework\TestCase;

class NewQueueTest extends TestCase
{

    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testIsItemAddedToQueue()
    {
        $this->queue->push('Testing');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testCanRemoveItemFromQueue()
    {
        $this->queue = new Queue;

        $this->queue->push('Testing');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('Testing', $item);
    }

    public function testItemOneIsAddedFirst()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
        // $item = $this->queue->pop();
        // $this->assertEquals('first', $item);
    }
}
