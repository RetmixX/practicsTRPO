<?php

namespace Domain\Group\Models;


use Domain\Shared\Models\BaseModel;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property bool $sex
 * @property int $group_id
 */
class Student extends BaseModel
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'sex',
        'group_id',
    ];
}
