<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\LoginAction;
use Domain\Shared\DTO\LoginDTO;
use Domain\Shared\ViewModels\User\AuthViewModel;

class AuthController extends Controller
{
    public function __invoke(LoginDTO $data)
    {
        return new AuthViewModel(LoginAction::execute($data));
    }
}
