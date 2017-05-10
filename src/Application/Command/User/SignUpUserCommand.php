<?php

namespace Application\Command\User;

use Application\Command\Command;

class SignUpUserCommand implements Command
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function email()
    {
        return $this->email;
    }
}