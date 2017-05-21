<?php

namespace Domain\Model\User;

use Domain\Exception\User\EmailValidationException;

class User
{
    /**
     * @var UserId
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $twitterAccount;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * User constructor.
     * @param UserId $userId
     * @param $email
     * @param $twitterAccount
     * @throws EmailValidationException
     */
    public function __construct(UserId $userId, $email, $twitterAccount)
    {
        $this->id = $userId;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailValidationException();
        }

        $this->email = $email;
        $this->twitterAccount = $twitterAccount;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function twitterAccount(): string
    {
        return $this->twitterAccount;
    }

    public function __toString(): string
    {
        return $this->email();
    }
}