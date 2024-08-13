<?php

namespace App\Modules\Classroom\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassroomTeacher extends BaseModel
{
    use SoftDeletes;

    public $table = 'classroom_teachers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'classroom_id',
        'teacher_id',
    ];
}
