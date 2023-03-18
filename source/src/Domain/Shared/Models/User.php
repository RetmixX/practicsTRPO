<?php

namespace Domain\Shared\Models;

use Database\Factories\Shared\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property bool $is_active
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];

    protected static function newFactory()
    {
        return app(UserFactory::class);
    }
}
