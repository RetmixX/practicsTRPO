<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\RegistrationUserAction;
use Domain\Shared\DTO\UserDTO;
use Domain\Shared\Enums\UserEnum;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function __invoke(UserDTO $data): JsonResponse
    {
        return response()->json(
            new CreateObjectViewModel(
                RegistrationUserAction::execute($data),
                UserEnum::Create->value
            ),
            201
        );
    }


}
