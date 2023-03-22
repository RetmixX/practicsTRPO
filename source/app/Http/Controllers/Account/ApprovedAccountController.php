<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\ApprovedUserAction;
use Domain\Shared\Enums\UserEnum;
use Domain\Shared\Models\User;
use Domain\Shared\ViewModels\CRUD\UpdateObjectViewModel;

class ApprovedAccountController extends Controller
{
    public function __invoke(User $user)
    {
        return new UpdateObjectViewModel(ApprovedUserAction::execute($user), UserEnum::Approve->value);
    }
}
