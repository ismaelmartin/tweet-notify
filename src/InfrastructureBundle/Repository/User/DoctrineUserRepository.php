<?php

namespace InfrastructureBundle\Repository\User;

use Doctrine\ORM\EntityManager;
use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Domain\Repository\User\UserRepository;

class DoctrineUserRepository implements UserRepository
{
    const REPO_NAME = 'InfrastructureBundle:User';

    private $em;

    /**
     * DoctrineUserRepository constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param UserId $userId
     * @return User
     */
    public function findById(UserId $userId)
    {
        // TODO: Implement findById() method.
    }

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail($email)
    {
        // TODO: Implement findByEmail() method.
    }

    /**
     * @param User $user
     */
    public function create(User $user)
    {
        // TODO: Implement create() method.
    }
}