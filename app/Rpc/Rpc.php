<?php

declare(strict_types=1);

namespace App\Rpc;

/**
 * Method handler factory.
 */
interface Rpc
{
    public function getMethod(RpcRequest $request): RpcMethodHandler;
}
