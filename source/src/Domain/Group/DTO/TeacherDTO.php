<?php

namespace Domain\Group\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class TeacherDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $name,
        public readonly string $surname,
        public readonly string $patronymic,
        public readonly string $sex,
    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => 'prohibited',
            'name' => 'required|string|min:1|max:100',
            'surname' => 'required|string|min:1|max:100',
            'patronymic' => 'required|string|min:1|max:100',
            'sex' => 'required|string|max:1|in:М,Ж',
        ];
    }
}
