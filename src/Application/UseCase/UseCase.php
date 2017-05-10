<?php

namespace Application\UseCase;

use Application\Command\Command;

interface UseCase
{
    public function execute(Command $command);

    /**
     * @return string
     */
    public function getManagedCommand();
}