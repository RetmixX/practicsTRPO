<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\StudentDTO;
use Domain\Group\DTO\TeacherDTO;
use Domain\Shared\ViewModels\ViewModel;

class CreateWorkerViewModel extends ViewModel
{
    public function __construct(
        public readonly StudentDTO|TeacherDTO $data,
        public readonly string $message,
    ) {
    }

    public function message(): string
    {
        return $this->message;
    }

    public function object(): StudentDTO|TeacherDTO
    {
        return $this->data;
    }

}
