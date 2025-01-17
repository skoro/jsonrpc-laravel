<?php

declare(strict_types=1);

namespace App\Rpc\Contracts;

use App\Rpc\RpcMethodHandler;

/**
 * Resolves RPC method name to a method handler instance.
 */
interface MethodHandlerClassResolver
{
    /**
     * @param  non-empty-string  $methodName  The Rpc method name.
     */
    public function resolve(string $methodName): RpcMethodHandler;
}
