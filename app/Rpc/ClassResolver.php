<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Rpc\Contracts\MethodHandlerClassResolver;

final class ClassResolver implements MethodHandlerClassResolver
{
    public function resolve(string $methodName): RpcMethodHandler
    {
        $baseClassName = trim($methodName);
        if (! $baseClassName) {
            throw new \Exception('Method name cannot be empty');
        }

        $className = __NAMESPACE__.'\\Methods\\'.ucfirst($baseClassName);
        if (! class_exists($className)) {
            throw new \Exception("Method '{$methodName}' is not implemented");
        }

        $handler = app($className);
        if (! $handler instanceof RpcMethodHandler) {
            throw new \Exception("'{$baseClassName}' must be instance of RpcMethodHandler");
        }

        return $handler;
    }
}
