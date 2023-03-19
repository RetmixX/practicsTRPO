<?php

namespace Domain\Group\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

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
}
