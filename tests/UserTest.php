<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserReturnsFullName()
    {
        $user = new User;

        $user->first_name = 'Magnus';
        $user->last_name = 'Karström';

        $this->assertEquals('Magnus Karström', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user = new User;

        $user->first_name = 'Magnus';

        $this->assertEquals('Magnus', $user->first_name);
    }

    public function testNotificationISSent()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('test3@yesweb.se'), $this->equalTo('Hello from UserTest'))
            ->willReturn(true);

        // $user->setMailer(new Mailer);
        $user->setMailer($mock_mailer);

        $user->email = 'test3@yesweb.se';

        $this->assertTrue($user->notify('Hello from UserTest'));
    }
}
