<?php

namespace Domain\Task\Models;

use Carbon\Carbon;
use Domain\Group\Models\Group;
use Domain\Shared\Models\BaseModel;
use Domain\Task\DTO\TaskDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Mehradsadeghi\FilterQueryString\FilterQueryString;


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
    use FilterQueryString;

    protected string $dataClass = TaskDTO::class;

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

    protected $filters = [
        'status',
        'startDate',
        'endDate',
    ];

    public function status($query, $value)
    {
        return $query->where('status', $value);
    }

    public function startDate($query, $value)
    {
        return $query->where('date', '>=', Carbon::create($value)->format('Y-m-d'));
    }

    public function endDate($query, $value)
    {
        return $query->where('date', '<=', Carbon::create($value)->format('Y-m-d'));
    }
}
