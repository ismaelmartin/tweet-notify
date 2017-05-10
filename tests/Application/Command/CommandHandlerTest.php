<?php

namespace Application\Command;

use Application\UseCase\UseCase;
use Domain\Exception\DomainException;
use Symfony\Component\HttpFoundation\Response;

class CommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $useCase;
    private $commandHandler;

    public function setUp()
    {
        $this->useCase = $this->getMockBuilder(UseCase::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->commandHandler = new CommandHandler();
    }

    public function testRegisterCommandsWithCorrectInterface()
    {
        $this->commandHandler->registerCommands([
            $this->useCase,
            $this->useCase,
        ]);
    }

    /**
     * @expectedException \LogicException
     */
    public function testRegisterCommandsExceptionIfUseCaseDoesNotRespectInterface()
    {
        $this->commandHandler->registerCommands([
            new \stdClass()
        ]);
    }

    public function testExecuteSuccess()
    {
        $this->useCase
            ->expects($this->once())
            ->method('getManagedCommand')
            ->will($this->returnValue(Fake::class));

        $this->useCase
            ->expects($this->once())
            ->method('execute');

        $this->commandHandler->registerCommands([
            $this->useCase
        ]);

        $result = $this->commandHandler->execute(new Fake());
        $this->assertInstanceOf(Response::class, $result);
        $this->assertEquals(Response::HTTP_OK, $result->getStatusCode());
    }

    public function testExecuteMethodThrowDomainException()
    {
        $this->useCase
            ->expects($this->once())
            ->method('getManagedCommand')
            ->will($this->returnValue(Fake::class));

        $this->useCase
            ->expects($this->once())
            ->method('execute')
            ->will($this->throwException(new DomainException('Exception', 500)));

        $this->commandHandler->registerCommands([
            $this->useCase
        ]);

        $result = $this->commandHandler->execute(new Fake());
        $this->assertInstanceOf(Response::class, $result);
        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $result->getStatusCode());
    }

    public function testExecuteMethodThrowException()
    {
        $this->useCase
            ->expects($this->once())
            ->method('getManagedCommand')
            ->will($this->returnValue(Fake::class));

        $this->useCase
            ->expects($this->once())
            ->method('execute')
            ->will($this->throwException(new \Exception('Exception', 500)));

        $this->commandHandler->registerCommands([
            $this->useCase
        ]);

        $result = $this->commandHandler->execute(new Fake());
        $this->assertInstanceOf(Response::class, $result);
        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $result->getStatusCode());
    }
}

class Fake implements Command{};