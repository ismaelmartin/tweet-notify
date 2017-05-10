<?php

namespace InfrastructureBundle;

use InfrastructureBundle\DependencyInjection\Compiler\CommandHandlerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class InfrastructureBundle extends Bundle
{
    public function build(ContainerBuilder $containerBuilder)
    {
        parent::build($containerBuilder);

        $containerBuilder->addCompilerPass(new CommandHandlerCompilerPass());
    }
}
