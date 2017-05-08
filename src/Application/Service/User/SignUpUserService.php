<?php

namespace Application\Service\User;

use Application\Service\ApplicationService;
use Domain\Exception\User\UserAlreadyExistsException;
use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Domain\Repository\User\UserRepository;

class SignUpUserService implements ApplicationService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($request = null)
    {
        $email = $request->email();

        $user = $this->userRepository->findByEmail($email);
        if (null !== $user) {
            throw new UserAlreadyExistsException();
        }

        $user = new User(
            new UserId(),
            $email
        );

        $this->userRepository->create($user);
    }
}