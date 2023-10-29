<?php

namespace GS\EnvProcessor\DependencyInjection;

use Symfony\Component\Filesystem\{
    Path
};
use GS\EnvProcessor\Contracts\GSEnvProcessorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractEnvProcessor implements GSEnvProcessorInterface
{
    public function __construct(
        protected readonly TranslatorInterface $t,
    ) {
    }

    //###> CHANGE ME ###

    /* You can already use this env processor name
	
	public const ENV_PROCESSOR_NAME = '!CHANGE_ME!';

	public const ENV_PROCESSOR_TYPES = [ 
		'!CHANGE_ME!',
	]; // or JUST STRING
	*/

    //###< CHANGE ME ###


    //###> REALIZED ABSTRACT ###

	/*
		[
			'NAME_ENV_PROCESSOR' => 'ALL|ITS|TYPES',
		]
	*/
    public static function getProvidedTypes(): array
    {
		$types = static::ENV_PROCESSOR_TYPES;
		
		if (!\is_array($types)) $types = [$types];
		
        return [
			static::ENV_PROCESSOR_NAME => \implode('|', $types),
		];
    }

    //###< REALIZED ABSTRACT ###


    //###> API ###

    protected function trans(
        string $message,
        array $parameters = [],
    ): string {
        return $this->t->trans(
            $message,
            parameters: $parameters,
        );
    }

    //###< API ###
}
