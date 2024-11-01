<?php

use PHPUnit\Framework\TestCase;

class NewQueueTest extends TestCase
{

    public function testNewQueueIsEmpty()
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());
    }

    public function testIsItemAddedToQueue()
    {
        $queue = new Queue;

        $queue->push('Testing');

        $this->assertEquals(1, $queue->getCount());
    }

    public function testCanRemoveItemFromQueue()
    {
        $queue = new Queue;

        $queue->push('Testing');
        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals('Testing', $item);
    }
}
