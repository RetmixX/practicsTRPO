<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Group\Models\Student;
use Domain\Shared\ViewModels\ViewModel;

class RemoveStudentFromGroupViewModel extends ViewModel
{
    public function __construct(
        public readonly GroupDTO $data,
        public readonly Student $student
    ) {
    }

    public function message(): string
    {
        return "Студент с id:{$this->student->id} удален из группы";
    }

    public function updateObject(): GroupDTO
    {
        return $this->data;
    }

}
