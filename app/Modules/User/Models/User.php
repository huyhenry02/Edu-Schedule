<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'phone_number',
        'user_type',
        'email_verified_at',
        'birthday',
    ];
    /**
     * The primary key for the model.
     *
     * @var int
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
     public const USER_ACCESS_TOKEN = 'app';
    public function revokeExistingTokensFor(string $appName): void
    {
        $this->tokens()->where(
            [
                'name' => $appName,
                'revoked' => false
            ]
        )->update([
            'revoked' => true,
            'updated_at' => now(),
        ]);
    }
}
