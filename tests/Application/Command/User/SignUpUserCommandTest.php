<?php

namespace Application\Command\User;

class SignUpUserCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConstructAndGetters()
    {
        $email = 'email@email.com';
        $twitterAccount = '@twitter';
        $command = new SignUpUserCommand($email, $twitterAccount);

        $this->assertEquals($email, $command->email());
        $this->assertEquals($twitterAccount, $command->twitterAccount());
    }
}