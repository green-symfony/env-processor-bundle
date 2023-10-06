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
			->info(''
				. 'You can copy this example: "'
				. \dirname(__DIR__)
				. DIRECTORY_SEPARATOR . 'config'
				. DIRECTORY_SEPARATOR . 'packages'
				. DIRECTORY_SEPARATOR . 'gs_env_processor.yaml'
				. '"'
			)
            ->children()
			
				->scalarNode(GSEnvProcessorExtension::LOCALE)
					->isRequired()//->defaultValue($this->locale)
                    ->info('User\'s locale')
                    //->defaultValue('%gs_generic_parts.locale%') Don't work, it's a simple string if defaultValue
                ->end()
				
            ->end()
        ;
		
        //$treeBuilder->setPathSeparator('/');

        return $treeBuilder;
    }

    //###> HELPERS ###
}
