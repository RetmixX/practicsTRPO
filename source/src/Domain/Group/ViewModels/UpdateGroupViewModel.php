<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Shared\ViewModels\ViewModel;

class UpdateGroupViewModel extends ViewModel
{
    public function __construct(
        public readonly GroupDTO $data,
    ) {
    }

    public function group(): GroupDTO
    {
        return $this->data;
    }
}
