<?php

namespace Application\Command;

use Application\UseCase\UseCase;
use Domain\Exception\DomainException;
use Symfony\Component\HttpFoundation\Response;

class CommandHandler
{
    /**
     * @var UseCase[]
     */
    private $useCases;

    public function registerCommands(array $useCases)
    {
        foreach ($useCases as $useCase) {
            if ($useCase instanceof UseCase) {
                $this->useCases[$useCase->getManagedCommand()] = $useCase;
            } else {
                throw new \LogicException('CommandHandler registerCommands expects an array of UseCase');
            }
        }
    }

    /**
     * @param $command
     * @return Response
     */
    public function execute($command)
    {
        $this->exceptionIfCommandNotManaged($command);

        try {
            $result = $this->useCases[get_class($command)]->execute($command);

            return new Response($result, Response::HTTP_OK);
        } catch (DomainException $e) {
            return new Response($e->getMessage(), $e->getCode());
        } catch (\Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $command
     */
    private function exceptionIfCommandNotManaged($command)
    {
        $commandClass = get_class($command);
        if (!array_key_exists($commandClass, $this->useCases)) {
            throw new \LogicException($commandClass . ' is not a managed command');
        }
    }
}