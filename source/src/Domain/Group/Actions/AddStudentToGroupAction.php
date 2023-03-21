<?php

namespace Domain\Group\Actions;

use Domain\Group\DTO\GroupDTO;
use Domain\Group\Exceptions\GroupError;
use Domain\Group\Exceptions\UpdateGroupError;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Illuminate\Support\Facades\DB;

class AddStudentToGroupAction
{
    public static function execute(Group $group, Student $student)
    {
        throw_unless(is_null($student->group_id),
            GroupError::class, message: 'Студент состоит в другой группе');

        try {
            DB::beginTransaction();
            $student->update([
                'group_id' => $group->id
            ]);

            DB::commit();
            return GroupDTO::from($group);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new UpdateGroupError(message: 'При добавлении студента произошла ошибка');
        }
    }
}
