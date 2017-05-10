<?php

namespace Domain\Model\User;

class UserIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $userId = new UserId();

        $this->assertTrue(is_string($userId->id()));
        $this->assertEquals($userId->id(), $userId);
    }

    /**
     * @test
     */
    public function testEqualsMethod()
    {
        $userId = new UserId();
        $anotherUserId = new UserId();

        $this->assertFalse($userId->equals($anotherUserId));
        $this->assertTrue($userId->equals($userId));
    }
}