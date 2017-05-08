<?php

namespace Domain\Model\User;

class User
{
    /**
     * @var UserId
     */
    protected $userId;

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
        $this->userId = $userId;
        $this->email = $email;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return UserId
     */
    public function id()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }
}