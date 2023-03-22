<?php

namespace Domain\Task\Actions;

use Domain\Group\Models\Group;
use Domain\Task\DTO\TaskDTO;
use Domain\Task\Models\Task;

class CreateTaskAction
{
    public static function execute(Group $group, TaskDTO $data): Task
    {
        return Task::create([
            'name' => $data->name,
            'description' => $data->description,
            'status' => $data->status,
            'date' => $data->date,
            'group_id' => $group->id
        ]);
    }
}
