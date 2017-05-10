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
        $command = new SignUpUserCommand($email);

        $this->assertEquals($email, $command->email());
    }
}