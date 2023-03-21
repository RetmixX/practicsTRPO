<?php

namespace Domain\Group\Policies;

use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Shared\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
    }

    public function view(User $user, Group $group): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Group $group): bool
    {
    }

    public function delete(User $user, Group $group): bool
    {
    }

    public function removeStudentFromGroup(User $user, Group $group, Student $student): bool
    {
        return $group->students->pluck('id')->contains($student->id);
    }

    public function restore(User $user, Group $group): bool
    {
    }

    public function forceDelete(User $user, Group $group): bool
    {
    }
}
