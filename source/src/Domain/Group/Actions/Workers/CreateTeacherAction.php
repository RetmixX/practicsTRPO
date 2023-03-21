<?php

namespace Domain\Group\Actions\Workers;

use Domain\Group\DTO\TeacherDTO;
use Domain\Group\Models\Teacher;

class CreateTeacherAction
{
    public static function execute(TeacherDTO $data): TeacherDTO
    {
        return TeacherDTO::from(Teacher::create($data->all()));
    }
}
