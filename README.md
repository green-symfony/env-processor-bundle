env-rocessor-bundle
========

## Description

This bundle provides the following env-processors names:
| Env Processor's names | Description | Code |
| ------------- | ------------- | ------------- |
| is_absolute_path | This path must be absolute | [code](https://github.com/green-symfony/env-processor-bundle/blob/main/src/DependencyInjection/IsAbsolutePathVarProcessor.php) |
| is_exists_path | This path must exist | [code](https://github.com/green-symfony/env-processor-bundle/blob/main/src/DependencyInjection/IsExistsPathVarProcessor.php) |
| normalize_path | Replaces php's \DIRECTORY_SEPARATOR with "/" | [code](https://github.com/green-symfony/env-processor-bundle/blob/main/src/DependencyInjection/NormalizePathEnvVarProcessor.php) |

## Installation

### Step 1: Download the bundle

[Symfony Env Processors Usage](https://github.com/green-symfony/docs/blob/main/docs/bundles_green_symfony%20mkdir.md)

```console
git clone "https://github.com/green-symfony/env-processor-bundle.git"
```

### Step 2: Require the bundle

In your `%kernel.project_dir%/composer.json`

```json
"require": {
	"green-symfony/env-processor-bundle": "VERSION"
},
"repositories": [
	{
		"type": "path",
		"url": "./bundles/green-symfony/env-processor-bundle"
	}
]
```

Open your console into your main project directory and execute:

```console
composer require "green-symfony/env-processor-bundle"
```

### Step 4: Just use it

Everything has already installed!
You can already use it.

## How to use these Symfony Env Processors?

[Symfony Env Processors Usage](https://github.com/green-symfony/docs/blob/main/docs/symfony%20env-processors%20usage.md)