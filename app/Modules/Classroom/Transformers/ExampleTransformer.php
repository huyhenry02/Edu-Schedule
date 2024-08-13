<?php

namespace App\Modules\Classroom\Transformers;

use App\Modules\Classroom\Models\Classroom;
use League\Fractal\TransformerAbstract;

class ExampleTransformer extends TransformerAbstract
{
    public function transform(Classroom $example): array
    {
        return [
            //
        ];
    }
}
