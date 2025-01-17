<?php

declare(strict_types=1);

namespace App\Rpc\Methods;

use App\Attributes\ByDefault;
use App\Attributes\Validate;
use App\Rpc\RpcMethodHandler;
use App\Rules\Country as CountryRule;

final class Test extends RpcMethodHandler
{
    #[Validate('nullable|boolean')]
    #[ByDefault(null)]
    public readonly ?bool $trashed;

    #[Validate('required|string|max:255')]
    public readonly string $id;

    #[Validate(['required', 'string', 'max:255', 'in:ok,done'])]
    public readonly string $status;

    #[Validate('required|integer')]
    public readonly int $index;

    public readonly string $country;

    public function rules(): array
    {
        return [
            'country' => ['required', new CountryRule],
        ];
    }

    public function __invoke()
    {
        dd($this);

        return [];
    }
}
