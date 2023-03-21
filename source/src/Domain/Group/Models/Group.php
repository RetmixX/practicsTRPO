<?php

namespace Domain\Group\Models;

use Domain\Group\DTO\GroupDTO;
use Domain\Shared\Models\BaseModel;
use Domain\Task\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @property int $id
 * @property string $name
 * @property int $teacher_id
 * @property Teacher chiefGroup
 * @property Collection students
 * @property Collection groupTasks
 */
class Group extends BaseModel
{
    protected string $dataClass = GroupDTO::class;
    protected $fillable = [
        'name',
        'teacher_id',
    ];

    public function chiefGroup(): HasOne
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function groupTasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
