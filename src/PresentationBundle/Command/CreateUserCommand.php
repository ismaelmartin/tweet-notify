<?php

namespace PresentationBundle\Command;

use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates new user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->getContainer()->get('doctrine_repository_user');
        $user = new User(new UserId(), 'isma1024@gmail.com');

        $repository->save($user);

        $output->writeln("User created.");
    }
}