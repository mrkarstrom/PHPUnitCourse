<?php

use PHPUnit\Framework\TestCase;

class NewMockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer;
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('test3@yesweb.se', 'Testing the mailer.');

        var_dump($result);
    }
}
