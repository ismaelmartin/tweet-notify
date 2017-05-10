<?php

namespace Domain\Model\User;

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
     */
    public function __construct(UserId $userId, $email)
    {
        $this->id = $userId;
        $this->email = $email;
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

    public function __toString(): string
    {
        return $this->email();
    }
}