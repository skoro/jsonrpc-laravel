<?php

declare(strict_types=1);

namespace App\Rpc;

interface Rpc
{
    public function getMethod(RpcRequest $request): RpcMethodHandler;
}
