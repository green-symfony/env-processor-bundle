<?php

namespace GS\EnvProcessor;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use GS\EnvProcessor\{
	GSEnvProcessorExtension
};

class Configuration implements ConfigurationInterface
{
    public function __construct(
    ) {
    }

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(GSEnvProcessorExtension::PREFIX);

		$treeBuilder->getRootNode()
            ->children()
				
				//...

            ->end()
        ;
		
        //$treeBuilder->setPathSeparator('/');

        return $treeBuilder;
    }

    //###> HELPERS ###
}
