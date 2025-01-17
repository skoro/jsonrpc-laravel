<?php

declare(strict_types=1);

namespace App\Rpc;

final readonly class RpcRequest
{
    public string $version;

    public string|int|null $id;

    public string $method;

    public array $params;

    public static function create(array|object $data): self
    {
        $self = new self;

        if (is_object($data)) {
            $data = (array) $data;
            if (array_key_exists('params', $data) && is_object($data['params'])) {
                $data['params'] = (array) $data['params'];
            }
        }

        $self->id = $data['id'] ?? null;
        $self->method = $data['method'] ?? throw new \Exception('Rpc method is missing');
        $self->params = $data['params'] ?? [];

        return $self;
    }
}
