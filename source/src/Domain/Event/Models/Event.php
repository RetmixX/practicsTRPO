<?php

namespace Domain\Event\Models;

use Domain\Event\DTO\EventDTO;
use Domain\Shared\Models\BaseModel;


/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date
 */
class Event extends BaseModel
{
    protected $table = 'global_events';
    protected string $dataClass = EventDTO::class;
    protected $fillable = [
        'name',
        'description',
        'date'
    ];
}
