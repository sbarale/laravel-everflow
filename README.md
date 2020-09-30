# Laravel Everflow
Laravel wrapper for Everflow API

## Installation

```shell
composer require codegreencreative/laravel-everflow:^1.0
```
For Laravel 5.6+, this package uses service provider and alias auto discovery. You can still add the service provider and alias below in `config/app.php`.

    CodeGreenCreative\Everflow\EverflowServiceProvider::class,

in the `providers` array and optionally

    'Everflow' => CodeGreenCreative\Everflow\EverflowFacade::class,

to the `aliases` array.

## Configuration

Publish `everflow.php` config file.

```shell
php artisan vendor:publish --provider="CodeGreenCreative\Everflow\EverflowServiceProvider" --tag="config"
```

## Environment

Fill in your Everflow API key and cache store. Default values are used below.

```
EVERFLOW_API_KEY=
EVERFLOW_CACHE=file
```
