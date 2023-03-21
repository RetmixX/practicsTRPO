<?php

namespace Domain\Group\Actions;

use Domain\Group\DTO\GroupDTO;
use Domain\Group\Exceptions\UpdateGroupError;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Illuminate\Support\Facades\DB;

class RemoveStudentFromGroupAction
{
    public static function execute(Group $group, Student $student)
    {
        try {
            DB::beginTransaction();
            $student->update(['group_id' => null]);
            DB::commit();
            return GroupDTO::from($group);
        } catch (\Exception $ex) {
            DB::rollBack();
            throw new UpdateGroupError(message: 'При удалении студента из группы произошла ошибка');
        }
    }
}
