<?php

namespace Application\UseCase\User;

use Application\Command\Command;
use Application\Command\User\SignUpUserCommand;
use Application\UseCase\UseCase;
use Domain\Exception\User\UserAlreadyExistsException;
use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Domain\Repository\User\UserRepository;

class SignUpUserUseCase implements UseCase
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getManagedCommand()
    {
        return SignUpUserCommand::class;
    }

    public function execute(Command $command)
    {
        $email = $command->email();

        $user = $this->userRepository->findByEmail($email);
        if (null !== $user) {
            throw new UserAlreadyExistsException();
        }

        $user = new User(
            new UserId(),
            $email
        );

        $this->userRepository->save($user);

        return $user;
    }
}