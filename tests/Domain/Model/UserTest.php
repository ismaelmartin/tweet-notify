<?php

namespace Domain\Model\User;

use Domain\Exception\User\EmailValidationException;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $email = 'email@email.com';
        $twitterAccount = '@twitter';
        $user = new User(new UserId(), $email, $twitterAccount);

        $this->assertInstanceOf(UserId::class, $user->id());
        $this->assertEquals($email, $user->email());
        $this->assertEquals($twitterAccount, $user->twitterAccount());
        $this->assertEquals($email, $user);
    }

//    /**
//     * @test
//     * @expectedException EmailValidationException
//     */
//    public function testInvalidEmailThrowAnException()
//    {
//        $invalidEmail = 'email';
//        $twitterAccount = '@twitter';
//        $user = new User(new UserId(), $invalidEmail, $twitterAccount);
//    }
}