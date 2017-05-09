<?php

namespace PresentationBundle\Command;

use Domain\Model\User\User;
use Domain\Model\User\UserId;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:list-user')
            ->setDescription('List users.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->getContainer()->get('doctrine_repository_user');

        $output->writeln("==LIST USERS==");
        $output->writeln("==============");
        $users = $repository->findAll();
        foreach ($users as $user) {
            $output->writeln("ID:" . $user->id() . " | EMAIL: " . $user->email());
        }
        $output->writeln("==============");
    }
}