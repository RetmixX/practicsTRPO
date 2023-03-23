<?php

namespace Domain\Group\Policies;

use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Shared\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function removeStudentFromGroup(User $user, Group $group, Student $student): bool
    {
        return $group->students->pluck('id')->contains($student->id);
    }
}
