<?php

namespace PresentationBundle\Command;

use Application\Command\User\SignUpUserCommand;
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
        $commandHandler = $this->getContainer()->get('command_handler');
        $commandHandler->execute(new SignUpUserCommand('isma1024@gmail.com'));

        $output->writeln('User created.');
    }
}