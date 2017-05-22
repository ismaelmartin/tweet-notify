<?php

namespace Application\UseCase\User;

use Application\Command\Command;
use Application\Command\User\ListUsersCommand;
use Application\UseCase\UseCase;
use Domain\Repository\User\UserRepository;

class ListUsersUseCase implements UseCase
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getManagedCommand()
    {
        return ListUsersCommand::class;
    }

    public function execute(Command $command)
    {
        return serialize($this->userRepository->findAll());
    }
}