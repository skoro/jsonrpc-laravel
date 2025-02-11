<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Rpc\Contracts\HandlerPropertiesInitializer;
use App\Rpc\Contracts\MethodHandlerClassResolver;
use App\Rpc\Contracts\ParametersValidator;

final readonly class JsonRpcApi implements Rpc
{
    public function __construct(
        private MethodHandlerClassResolver $handlerClassResolver,
        private ParametersValidator $parametersValidator,
        private HandlerPropertiesInitializer $propertiesInitializer,
    ) {}

    public function getMethod(RpcRequest $request): RpcMethodHandler
    {
        $handler = $this->handlerClassResolver->resolve($request->method);

        $this->parametersValidator->getValidator($handler, $request->params)->validate();
        $this->propertiesInitializer->setProperties($handler, $request->params);

        return $handler;
    }
}
