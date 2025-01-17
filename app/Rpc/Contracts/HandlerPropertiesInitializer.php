<?php

declare(strict_types=1);

namespace App\Rpc\Contracts;

use App\Rpc\RpcMethodHandler;

interface HandlerPropertiesInitializer
{
    public function setProperties(RpcMethodHandler $handler, array $parameters): void;
}
