<?php

namespace Domain\Task\Models;

use Domain\Group\Models\Group;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @property int $id
 * @property string $name
 * @property string $date
 * @property int $group_id
 * @property string $description
 * @property string $status
 * @property Group group
 */
class Task extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'status',
        'group_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
