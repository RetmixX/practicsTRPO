<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DTO\UserDTO;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationUserAction
{
    public static function execute(UserDTO $data): UserDTO
    {
        return UserDTO::from(
            User::create(['email' => $data->email, 'password' => Hash::make($data->password), 'active' => false])
        );
    }
}
