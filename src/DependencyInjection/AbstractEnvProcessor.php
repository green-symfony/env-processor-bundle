<?php

namespace GS\EnvProcessor\DependencyInjection;

use Symfony\Component\Filesystem\{
    Path
};
use GS\EnvProcessor\Contracts\GSEnvProcessorInterface;

abstract class AbstractEnvProcessor implements GSEnvProcessorInterface
{
	//###> CHANGE ME ###
	
	/* You can already use this env processor name */
	//public const ENV_PROCESSOR_NAME = '!CHANGE ME!';
	
	//public const ENV_PROCESSOR_TYPE = '!CHANGE ME!';
	
	//###< CHANGE ME ###
	
	
	//###> REALIZED ABSTRACT ###
    
	public static function getProvidedTypes(): array
    {
        return [
            static::ENV_PROCESSOR_NAME => static::ENV_PROCESSOR_TYPE,
        ];
    }
	
	//###< REALIZED ABSTRACT ###
}
