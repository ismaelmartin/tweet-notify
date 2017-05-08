<?php

namespace Domain\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $user = new User(new UserId(), 'email@email.com');

        $this->assertInstanceOf(UserId::class, $user->id());
        $this->assertEquals('email@email.com', $user->email());
    }
}