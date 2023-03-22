<?php

namespace Domain\Task\ViewModels;

use Domain\Group\Models\Group;
use Domain\Shared\ViewModels\ViewModel;
use Domain\Task\Models\Task;
use Illuminate\Support\Collection;

class IndexTaskViewModel extends ViewModel
{
    public function __construct(
        public readonly Group $data
    ) {
    }

    public function objects(): Collection
    {
        return $this->data->groupTasks->map(fn(Task $task)=>$task->getData());
    }
}
