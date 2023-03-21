<?php

namespace Domain\Group\Actions\Workers;

use Domain\Group\DTO\StudentDTO;
use Domain\Group\Models\Student;

class CreateStudentAction
{
    public static function execute(StudentDTO $data): StudentDTO
    {
        return StudentDTO::from(Student::create($data->all()));
    }
}
