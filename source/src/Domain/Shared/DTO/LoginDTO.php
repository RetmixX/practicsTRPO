<?php

namespace Domain\Shared\DTO;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class LoginDTO extends Data
{
    public function __construct(
        #[Required]
        public readonly string $email,
        #[Required]
        public readonly string $password
    ) {
    }
}
