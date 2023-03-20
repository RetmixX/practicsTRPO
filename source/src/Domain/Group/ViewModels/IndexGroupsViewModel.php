<?php

namespace Domain\Group\ViewModels;

use Domain\Group\DTO\GroupDTO;
use Domain\Group\Models\Group;
use Domain\Shared\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class IndexGroupsViewModel extends ViewModel
{
    public function groups(): Collection
    {
        return Group::all()->map(fn(Group $group) => GroupDTO::from($group)->exclude('students'));
    }
}
