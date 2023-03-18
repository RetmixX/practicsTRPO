<?php

namespace Domain\Event;

use Domain\Shared\Models\BaseModel;


/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date
 */
class Event extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'date'
    ];
}
