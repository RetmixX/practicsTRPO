<?php

namespace Domain\Group\Actions;

use Domain\Group\DTO\GroupDTO;
use Domain\Group\DTO\UpdateGroupDTO;
use Domain\Group\Exceptions\UpdateGroupError;
use Domain\Group\Models\Group;
use Illuminate\Support\Facades\DB;

class UpdateGroupAction
{
    public static function execute(Group $group, UpdateGroupDTO $data): GroupDTO
    {
        try {
            DB::beginTransaction();
            $group->update($data->all());
            DB::commit();
            return GroupDTO::fromModel($group)->exclude('students');
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new UpdateGroupError(message: $exception->getMessage());
        }
    }
}
