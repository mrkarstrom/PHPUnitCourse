<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);
        // $mailer = new Mailer;

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('test@user.com', 'Lets get this mailing going');
        // $result = $mailer->sendMessage('test@user.com', 'Lets get this mailing going');

        $this->assertTrue($result);
    }
}

// When testing classes with dependencies we can create mock-objects to remove the dependencies! 