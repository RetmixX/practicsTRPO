<?php

namespace Domain\Event\Models;

use Carbon\Carbon;
use Domain\Event\DTO\EventDTO;
use Domain\Shared\Models\BaseModel;
use Mehradsadeghi\FilterQueryString\FilterQueryString;


/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date
 */
class Event extends BaseModel
{
    use FilterQueryString;

    protected $table = 'global_events';
    protected string $dataClass = EventDTO::class;
    protected $fillable = [
        'name',
        'description',
        'date'
    ];

    protected $filters = [
        'startDate',
        'endDate',
    ];

    public function startDate($query, $value)
    {
        return $query->where('date', '>=', Carbon::create($value)->format('Y-m-d'));
    }

    public function endDate($query, $value)
    {
        return $query->where('date', '<=', Carbon::create($value)->format('Y-m-d'));
    }
}
