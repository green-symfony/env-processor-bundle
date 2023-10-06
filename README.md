env-rocessor-bundle
========

## Description

This bundle provides the following env-processors names:
| Env Processor's names | Description | Code |
| ------------- | ------------- | ------------- |
| is_absolute_path | This path must be absolute | if (!\Symfony\Component\Filesystem\Path::isAbsolute(YOUR_ENV)) { <br> new \Exception; <br> } |
| is_exists_path | This path must exist | if (!\file_exists(YOUR_ENV)) { <br> new \Exception(...); <br> } |
| normalize_path | Replaces php's \DIRECTORY_SEPARATOR with "/" | Applies to the string: `reutrn \Symfony\Component\Filesystem\Path::normalize(YOUR_ENV)` |

## Installation

### Step 1: Download the bundle

In your `%kernel.project_dir%/.gitignore`

Copy down this string

```txt
/bundles/
```

And create the `%kernel.project_dir%/bundles/green-symfony/` directories by execution:

```console
cd "YOUR_PROJECT_PATH"
```

```console
mkdir "./bundles/green-symfony" -p
```

```console
cd "./bundles/green-symfony"
```

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