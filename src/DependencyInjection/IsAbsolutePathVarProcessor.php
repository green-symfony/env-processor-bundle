<?php

namespace GS\EnvProcessor\DependencyInjection;

use Symfony\Component\Filesystem\{
    Path
};

class IsAbsolutePathVarProcessor extends AbstractEnvProcessor
{
	/* You can already use this env processor name */
	public const ENV_PROCESSOR_NAME = 'is_absolute_path';
	
	public const ENV_PROCESSOR_TYPE = 'string';
	
    public function getEnv(
        string $prefix,
        string $name,
        \Closure $getEnv,
    ): mixed {
        $path   = $getEnv($name);

        if (!Path::isAbsolute($path)) {
            throw new \Exception(
                'Путь "' . $path . '"'
                . ' ' . 'должен быть абсолютным!'
            );
        }

        return $path;
    }
}
