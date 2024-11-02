<?php

use PharIo\Manifest\Email;
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

        $user->email = 'test3@yesweb.se';

        $this->assertTrue($user->notify('Hello from UserTest'));
    }
}
