<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Shared\ViewModels\ViewModel;

class CreateGroupViewModel extends ViewModel
{
    public function __construct(
        public readonly GroupDTO $data,
    ) {
    }

    public function message(): string
    {
        return 'Группа создана';
    }

    public function object(): GroupDTO
    {
        return $this->data;
    }

}
