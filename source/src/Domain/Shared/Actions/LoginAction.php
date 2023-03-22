<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DTO\LoginDTO;
use Domain\Shared\Exceptions\UserExceptions\LoginFailedException;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;

class LoginAction
{
    public static function execute(LoginDTO $data): NewAccessToken
    {
        $user = User::where('email', $data->email)->firstOrFail();
        throw_unless(Hash::check($data->password, $user->password), LoginFailedException::class);
        throw_unless($user->active, LoginFailedException::class, message: 'Аккаунт не подтвержден', code: 403);

        return $user->createToken(rand());
    }
}
