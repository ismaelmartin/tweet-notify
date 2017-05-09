<?php

namespace Domain\Repository\User;

use Domain\Model\User\User;
use Domain\Model\User\UserId;

interface UserRepository
{
    /**
     * @param UserId $userId
     * @return User
     */
    public function findById(UserId $userId);

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail($email);

    /**
     * @param User $user
     */
    public function save(User $user);
}