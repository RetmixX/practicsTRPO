<?php

namespace Domain\Shared\Models;

use Database\Factories\Shared\UserFactory;
use Domain\Shared\DTO\UserDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\LaravelData\WithData;


/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property bool $active
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use WithData;

    protected string $dataClass = UserDTO::class;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'active',
    ];

    protected static function newFactory()
    {
        return app(UserFactory::class);
    }
}
