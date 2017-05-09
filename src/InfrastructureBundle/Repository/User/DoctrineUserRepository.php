<?php

namespace InfrastructureBundle\Repository\User;

use Doctrine\ORM\EntityManager;
use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Domain\Repository\User\UserRepository;

class DoctrineUserRepository implements UserRepository
{
    const REPO_NAME = 'Domain:User';

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
    public function findById(UserId $userId): User
    {
        $qb = $this
            ->em
            ->createQueryBuilder()
            ->select('u')
            ->from(self::REPO_NAME, 'u')
            ->where('u.id = :id')
            ->setParameter('id', $userId->id())
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail($email): User
    {
        $qb = $this
            ->em
            ->createQueryBuilder()
            ->select('u')
            ->from(self::REPO_NAME, 'u')
            ->where('u.email = :email')
            ->setParameter('email', $email)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $qb = $this
            ->em
            ->createQueryBuilder()
            ->select('u')
            ->from(self::REPO_NAME, 'u')
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * @param User $user
     * @return void
     */
    public function save(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}