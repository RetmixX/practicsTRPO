<?php

namespace Domain\Task\Policies;

use Domain\Group\Models\Group;
use Domain\Shared\Models\User;
use Domain\Task\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
    }

    public function view(User $user, Task $task, Group $group): bool
    {
        return $group->groupTasks->pluck('id')->contains($task->id);
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Task $task): bool
    {
    }

    public function delete(User $user, Task $task): bool
    {
    }

    public function restore(User $user, Task $task): bool
    {
    }

    public function forceDelete(User $user, Task $task): bool
    {
    }
}
