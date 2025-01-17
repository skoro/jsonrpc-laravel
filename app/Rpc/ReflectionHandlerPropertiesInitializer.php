<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Rpc\Contracts\HandlerPropertiesInitializer;
use ReflectionObject;

final readonly class ReflectionHandlerPropertiesInitializer implements HandlerPropertiesInitializer
{
    public function setProperties(RpcMethodHandler $handler, array $parameters): void
    {
        $reflectionObject = new ReflectionObject($handler);

        foreach ($reflectionObject->getProperties() as $reflectionProperty) {
            $propName = $reflectionProperty->getName();
            if (isset($parameters[$propName])) {
                $reflectionProperty->setValue($handler, $parameters[$propName]);
            } else {
                // TODO: set default value from ByDefault attribute.
            }
        }
    }
}
