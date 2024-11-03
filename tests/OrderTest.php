<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // public function testOrderIsProcessed()
    // {
    //     // Mocking the PaymentGateway class with onlyMethods
    //     $gateway = $this->getMockBuilder(PaymentGateway::class)
    //         ->onlyMethods(['charge']) // Using onlyMethods for PHPUnit 8 and newer
    //         ->getMock();

    //     // Set up the charge method to return true
    //     $gateway->method('charge')
    //         ->willReturn(true);

    //     // Create an Order instance with the mocked PaymentGateway
    //     $order = new Order($gateway);
    //     $order->amount = 200;

    //     // Assert that the order is processed successfully
    //     $this->assertTrue($order->process());
    // }

    public function testIsUsedProcessedUsingMockery()
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        // Assert that the order is processed successfully
        $this->assertTrue($order->process());
    }
}
