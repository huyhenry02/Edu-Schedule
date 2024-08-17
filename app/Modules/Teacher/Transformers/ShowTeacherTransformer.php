<?php

namespace App\Modules\Teacher\Transformers;

use App\Modules\Example\Models\Example;
use App\Modules\Teacher\Models\Teacher;
use League\Fractal\TransformerAbstract;

class ShowTeacherTransformer extends TransformerAbstract
{
    public function transform(Teacher $teacher): array
    {
        return [
            'id' => $teacher->id,
            'user_id' => $teacher->user_id,
            'hire_date' => $teacher->hire_date,
            'qualification' => $teacher->qualification,
            'specialization' => $teacher->specialization,
            'salary' => $teacher->salary,
            'status' => $teacher->status,
        ];
    }
}
