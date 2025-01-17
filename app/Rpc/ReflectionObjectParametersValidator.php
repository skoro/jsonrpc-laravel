<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Attributes\Validate;
use App\Rpc\Contracts\ParametersValidator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use ReflectionObject;

final class ReflectionObjectParametersValidator implements ParametersValidator
{
    public function getValidator(RpcMethodHandler $handler, array $parameters): Validator
    {
        $reflectionObject = new ReflectionObject($handler);

        /** @var array<string, string|array> $rules */
        $rules = $handler->rules();

        foreach ($reflectionObject->getProperties() as $reflectionProperty) {
            $attributes = $reflectionProperty->getAttributes(Validate::class);
            foreach ($attributes as $attribute) {
                $rules[$reflectionProperty->getName()] = $attribute->newInstance()->rule;
            }
        }

        return ValidatorFacade::make($parameters, $rules);
    }
}
