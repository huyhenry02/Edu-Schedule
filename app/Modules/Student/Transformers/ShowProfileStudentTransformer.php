<?php

namespace App\Modules\Student\Transformers;

use App\Modules\Example\Models\Example;
use App\Modules\Student\Models\Student;
use League\Fractal\TransformerAbstract;

class ShowProfileStudentTransformer extends TransformerAbstract
{
    public function transform(Student $student): array
    {
        return [
            //
        ];
    }
}
