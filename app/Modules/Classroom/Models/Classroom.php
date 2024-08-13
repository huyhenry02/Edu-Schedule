<?php

namespace App\Modules\Classroom\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends BaseModel
{
    use SoftDeletes;

    public $table = 'classrooms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'code',
        'course_id',
        'created_by_id',
    ];
}
