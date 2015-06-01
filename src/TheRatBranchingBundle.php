<?php
namespace TheRat\BranchingBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use TheRat\BranchingBundle\DependencyInjection\Compiler\SwitchDbNameCompiler;

class TheRatBranchingBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SwitchDbNameCompiler());
    }
}
