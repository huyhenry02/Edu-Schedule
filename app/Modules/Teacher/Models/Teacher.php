<?php

namespace App\Modules\Teacher\Models;

use App\Models\BaseModel;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends BaseModel
{
    public $table = 'teachers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public const STATUS_ACTIVE = 'active';
    public const STATUS_RETIRED= 'retired';
    public const STATUS_ON_LEAVE = 'on_leave';
    public const STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_RETIRED,
        self::STATUS_ON_LEAVE,
    ];
    protected $fillable = [
        'user_id',
        'hire_date',
        'qualification',
        'specialization',
        'salary',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
