<?php

namespace App\Modules\Classroom\Repositories;

use App\Modules\Classroom\Models\Classroom;
use App\Modules\Classroom\Repositories\Interfaces\ClassroomInterface;
use App\Repositories\BaseRepository;


class ClassroomRepository extends BaseRepository implements ClassroomInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function getModel(): string
    {
        return Classroom::class;
    }
}
