<?php

declare(strict_types=1);

namespace App\Rpc;

abstract class RpcMethodHandler
{
    /**
     * Custom parameter rules.
     *
     * @return array<string, string|array>
     */
    public function rules(): array
    {
        return [];
    }

    public function __invoke()
    {
        throw new \Exception('Method not implemented');
    }
}
