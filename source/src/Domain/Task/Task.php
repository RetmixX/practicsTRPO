<?php

namespace Domain\Task;

use Domain\Group\Models\Group;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Collection groupsTask
 */
class Task extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function groupsTask(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'groups_tasks')
            ->withPivot(['date']);
    }
}
