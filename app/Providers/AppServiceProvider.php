<?php

declare(strict_types=1);

namespace App\Providers;

use App\Rpc\ClassResolver;
use App\Rpc\Contracts\HandlerPropertiesInitializer;
use App\Rpc\Contracts\MethodHandlerClassResolver;
use App\Rpc\Contracts\ParametersValidator;
use App\Rpc\JsonRpcApi;
use App\Rpc\ReflectionHandlerPropertiesInitializer;
use App\Rpc\ReflectionObjectParametersValidator;
use App\Rpc\Rpc;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        Rpc::class => JsonRpcApi::class,
        MethodHandlerClassResolver::class => ClassResolver::class,
        ParametersValidator::class => ReflectionObjectParametersValidator::class,
        HandlerPropertiesInitializer::class => ReflectionHandlerPropertiesInitializer::class,
    ];

    public $bindings = [
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
