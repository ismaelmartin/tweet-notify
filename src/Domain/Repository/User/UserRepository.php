<?php

namespace Domain\Repository\User;

use Domain\Model\User\User;
use Domain\Model\User\UserId;

interface UserRepository
{
    /**
     * @param UserId $userId
     * @return User|null
     */
    public function findById(UserId $userId);

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail($email);

    /**
     * @return User[]
     */
    public function findAll();

    /**
     * @param User $user
     */
    public function save(User $user);
}