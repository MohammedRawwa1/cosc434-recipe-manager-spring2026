<?php

use Illuminate\Foundation\Application;

$app = new Application($_ENV['APP_BASE_PATH'] ?? dirname(__DIR__));

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// Register application service providers that may not be present in config/app.php
if (class_exists(\App\Providers\AppServiceProvider::class)) {
    $app->register(\App\Providers\AppServiceProvider::class);
}

return $app;
