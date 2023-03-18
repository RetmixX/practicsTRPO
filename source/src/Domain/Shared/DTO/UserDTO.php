<?php

namespace Domain\Shared\DTO;

use Domain\Shared\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class UserDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $email,
        public readonly string $password,
        public readonly Optional|string $is_active,
    ) {
    }

    public static function fromModel(User $user): self
    {
        return self::from([
            'id' => $user->id,
            'email' => $user->email,
            'is_active' => $user->is_active,
        ]);
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }
}
