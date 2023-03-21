<?php

namespace Domain\Shared\ViewModels\User;

use Domain\Shared\DTO\UserDTO;
use Domain\Shared\Models\User;
use Domain\Shared\ViewModels\ViewModel;
use Laravel\Sanctum\NewAccessToken;

class AuthViewModel extends ViewModel
{
    public function __construct(
        public readonly NewAccessToken $token,
    ) {
    }

    public function token(): string
    {
        return $this->token->plainTextToken;
    }

}
