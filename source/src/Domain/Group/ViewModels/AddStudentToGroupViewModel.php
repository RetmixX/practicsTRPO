<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Shared\ViewModels\ViewModel;

class AddStudentToGroupViewModel extends ViewModel
{
    public function __construct(
        public readonly GroupDTO $data
    ) {
    }

    public function message(): string
    {
        return "Студент был добавлен в группу {$this->data->name}";
    }

    public function updateObject(): GroupDTO
    {
        return $this->data->include('teacher', 'students');
    }

}
