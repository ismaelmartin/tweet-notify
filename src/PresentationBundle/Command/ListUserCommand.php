<?php

namespace PresentationBundle\Command;

use Application\Command\User\ListUsersCommand;
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
        $commandHandler = $this->getContainer()->get('command_handler');
        $response = $commandHandler->execute(new ListUsersCommand());
        $users = unserialize($response->getContent());

        $output->writeln("\n\n    LIST USERS");
        $output->writeln("====================");
        foreach ($users as $user) {
            $output->writeln("ID:" . $user->id() . " | EMAIL: " . $user->email());
        }
        $output->writeln("====================\n\n");
    }
}