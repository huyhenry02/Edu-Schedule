<?php

namespace App\Modules\Course\Repositories;

use App\Modules\Course\Models\Course;
use App\Modules\Course\Repositories\Interfaces\CourseInterface;
use App\Repositories\BaseRepository;


class CourseRepository extends BaseRepository implements CourseInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function getModel(): string
    {
        return Course::class;
    }
}
