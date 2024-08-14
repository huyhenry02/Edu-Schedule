<?php

namespace App\Modules\User\Transformers;

use App\Modules\User\Models\User;
use League\Fractal\TransformerAbstract;

class UserShowTransformer extends TransformerAbstract
{
    public function transform(User $model): array
    {
        return [
            'id'         => $model->id,
            'name'       => $model->name,
            'email'      => $model->email,
        ];
    }
}
