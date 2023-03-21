<?php

namespace Domain\Group\DTO;

use Domain\Group\Models\Student;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StudentDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $name,
        public readonly string $surname,
        public readonly string $patronymic,
        public readonly string $sex,
        public readonly Optional|int $group_id,
    ) {
    }

    public static function fromModel(Student $student):self
    {
        return self::from([
            'id' => $student->id,
            'name' => $student->name,
            'surname' => $student->surname,
            'patronymic' => $student->patronymic,
            'sex' => $student->sex,
        ]);
    }

    public static function rules(): array
    {
        return [
            'id' => 'prohibited',
            'name' => 'required|string|min:1|max:100',
            'surname' => 'required|string|min:1|max:100',
            'patronymic' => 'required|string|min:1|max:100',
            'sex' => 'required|string|max:1|in:М,Ж',
            'group_id' => 'prohibited',
        ];
    }
}
