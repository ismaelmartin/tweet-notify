<?php

namespace Leopro\TripPlanner\Application\Command;

use Application\Service\ApplicationService;
use Domain\Exception\DomainException;
use Symfony\Component\HttpFoundation\Response;

class CommandHandler
{
    /**
     * @var ApplicationService[]
     */
    private $services;

    /**
     * @param $command
     * @return Response
     */
    public function execute($command)
    {
        $this->exceptionIfCommandNotManaged($command);

        try {
            $result = $this->services[get_class($command)]->execute($command);
            $response = new Response($result, Response::HTTP_OK);

            return $response;
        } catch (DomainException $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $command
     */
    private function exceptionIfCommandNotManaged($command)
    {
        $commandClass = get_class($command);
        if (!array_key_exists($commandClass, $this->services)) {
            throw new \LogicException($commandClass . ' is not a managed command');
        }
    }
}