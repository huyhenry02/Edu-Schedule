<?php

namespace App\Modules\Course\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends BaseModel
{

    public $table = 'courses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'created_by_id',
    ];

}
