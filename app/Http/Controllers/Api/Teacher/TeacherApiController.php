<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\ApiController;
use App\Modules\Teacher\Models\Teacher;
use App\Modules\Teacher\Requests\CreateTeacherRequest;
use App\Modules\Teacher\Transformers\ShowTeacherTransformer;
use App\Modules\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;
use Symfony\Component\HttpFoundation\Response;

class TeacherApiController extends ApiController
{

    /**
     * Create Teacher
     *
     * @param CreateTeacherRequest $request
     * @return JsonResponse
     */
    public function createTeacherForAdmin(CreateTeacherRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->validated();
            $input['password'] = bcrypt($input['password']);
            $input['status'] = Teacher::STATUS_ACTIVE;
            $input['user_type'] = User::TEACHER_ACCESS;
            $user = User::create($input);
            $teacher = $user->user()->create($input);
            $response = fractal($teacher, new ShowTeacherTransformer())->toArray();
            DB::commit();
            return $this->respondSuccess($response);
        }catch (Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
