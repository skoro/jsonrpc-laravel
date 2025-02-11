<?php

declare(strict_types=1);

namespace App\Rpc\Contracts;

use App\Rpc\RpcMethodHandler;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validator factory.
 */
interface ParametersValidator
{
    public function getValidator(RpcMethodHandler $handler, array $parameters): Validator;
}
