<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DTO\UserDTO;
use Domain\Shared\Exceptions\UserExceptions\ApprovedUserError;
use Domain\Shared\Models\User;

class ApprovedUserAction
{
    public static function execute(User $user): UserDTO
    {
        throw_unless(!$user->active, ApprovedUserError::class);
        $user->update(['active' => true]);
        return UserDTO::from($user);
    }
}
