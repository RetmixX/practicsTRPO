<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Shared\ViewModels\ViewModel;

class RetrieveGroupViewModel extends ViewModel
{
    public function __construct(
        public readonly GroupDTO $group,
    ) {
    }

    public function groupInfo(): GroupDTO
    {
        return $this->group;
    }
}
