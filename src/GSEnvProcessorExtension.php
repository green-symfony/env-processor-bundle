<?php

namespace GS\EnvProcessor;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\DependencyInjection\Definition;
use GS\EnvProcessor\Configuration;
use Symfony\Component\DependencyInjection\{
	Parameter,
	Reference
};
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\{
    YamlFileLoader
};
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use GS\EnvProcessor\Contracts\GSEnvProcessorInterface;

class GSEnvProcessorExtension extends ConfigurableExtension implements PrependExtensionInterface
{
    public const PREFIX = 'gs_env_processor';
	
	public function __construct() {
		
	}
	
	public function getAlias(): string
    {
		return self::PREFIX;
	}

    /**
        -   load packages .yaml
    */
    public function prepend(ContainerBuilder $container)
    {
        $this->loadYaml($container, [
            //['config/packages', 'translation.yaml'],
        ]);
    }

    public function getConfiguration(
        array $config,
        ContainerBuilder $container,
    ) {
		return new Configuration();
    }

    /**
        -   load services.yaml
        -   config->services
        -   bundle's tags
    */
    public function loadInternal(array $config, ContainerBuilder $container)
    {
        $this->loadYaml($container, [
            ['config', 'services.yaml'],
        ]);
        $this->setParametersFromBundleConfiguration(
			$config,
			$container,
		);
        $this->createServicesWithConfigArgumentsOfTheCurrentBundle(
			$config,
			$container,
		);
        $this->registerBundleTagsForAutoconfiguration(
			$container,
		);
    }

    //###> HELPERS ###

    private function setParametersFromBundleConfiguration(
        array $config,
        ContainerBuilder $container,
    ) {
        /*
        \dd(
            $container->hasParameter('error_prod_logger_email'),
            PropertyAccess::createPropertyAccessor()->getValue($config, '[error_prod_logger_email][from]'),
        );
		
		$pa = PropertyAccess::createPropertyAccessor();
		
        ServiceContainer::setParametersForce(
            $container,
            callbackGetValue: static function ($key) use (&$config, $pa) {
                return $pa->getValue($config, '['.$key.']');
            },
            parameterPrefix: self::PREFIX,
            keys: [
				self::<>,
            ],
        );
        */
		
		/* to use in this object */
		/*
		$this-><>Parameter = new Parameter(ServiceContainer::getParameterName(
			self::PREFIX,
			self::<>,
		));
		*/
    }

    private function createServicesWithConfigArgumentsOfTheCurrentBundle(
        array $config,
        ContainerBuilder $container,
    ) {
    }

    private function registerBundleTagsForAutoconfiguration(ContainerBuilder $container)
    {
        $container
            ->registerForAutoconfiguration(GSEnvProcessorInterface::class)
            ->addTag('container.env_var_processor')
        ;
    }

    /**
        @var    $relPath is a relPath or array with the following structure:
            [
                ['relPath', 'filename'],
                ...
            ]
    */
    private function loadYaml(
        ContainerBuilder $container,
        string|array $relPath,
        ?string $filename = null,
    ): void {

        if (\is_array($relPath)) {
            foreach ($relPath as [$path, $filename]) {
                $this->loadYaml($container, $path, $filename);
            }
            return;
        }

        if (\is_string($relPath) && $filename === null) {
            throw new \Exception('Incorrect method arguments');
        }

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                [
                    __DIR__ . '/../' . $relPath,
                ],
            ),
        );
        $loader->load($filename);
    }
}
