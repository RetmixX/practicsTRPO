<?php

namespace Domain\Task\ViewModels;

use Domain\Group\Models\Group;
use Domain\Task\Models\Task;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

class SearchTaskViewModel extends Data
{
    public function __construct(
        public readonly Group $group
    ) {
    }

    public function findObjects()
    {

        return Task::where('group_id', $this->group->id)->filter()->get()->map->getData()->values();
    }

}
