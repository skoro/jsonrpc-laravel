<?php

declare(strict_types=1);

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class ByDefault
{
    public function __construct(
        public mixed $value,
    ) {}
}
