<?php

namespace Application\Command\User;

use Application\Command\Command;

class SignUpUserCommand implements Command
{
    private $email;
    private $twitterAccount;

    public function __construct($email, $twitterAccount)
    {
        $this->email = $email;
        $this->twitterAccount = $twitterAccount;
    }

    public function email()
    {
        return $this->email;
    }

    public function twitterAccount()
    {
        return $this->twitterAccount;
    }
}