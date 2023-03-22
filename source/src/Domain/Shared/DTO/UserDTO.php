<?php

namespace Domain\Shared\DTO;

use Domain\Shared\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $email,
        public readonly Optional|string $password,
        public readonly Optional|bool $active,
    ) {
    }

    public static function fromModel(User $user): self
    {
        return self::from([
            'id' => $user->id,
            'email' => $user->email,
            'active' => $user->active,
        ]);
    }

    public static function rules(): array
    {
        return [
            'id' => 'prohibited',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|max:16',
            'active' => 'prohibited'
        ];
    }
}
