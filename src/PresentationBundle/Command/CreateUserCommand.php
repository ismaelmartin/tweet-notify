<?php

namespace PresentationBundle\Command;

use Application\Command\User\SignUpUserCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates new user.')
            ->addArgument('email', InputArgument::REQUIRED, 'Email of user')
            ->addArgument('twitterAccount', InputArgument::REQUIRED, 'Twitter account of user')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $twitterAccount = $input->getArgument('twitterAccount');

        $commandHandler = $this->getContainer()->get('command_handler');
        $commandHandler->execute(new SignUpUserCommand($email, $twitterAccount));

        $output->writeln('User created.');
    }
}