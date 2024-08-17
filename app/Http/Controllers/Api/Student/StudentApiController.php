<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\ApiController;
use App\Modules\Student\Requests\SignUpForStudentRequest;
use App\Modules\Student\Transformers\ShowProfileStudentTransformer;
use App\Modules\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;
use Symfony\Component\HttpFoundation\Response;

class StudentApiController extends ApiController
{
    public function signUp(SignUpForStudentRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->validated();
            $input['password'] = bcrypt($input['password']);
            $input['user_type'] = User::STUDENT_ACCESS;
            $user = User::create($input);
            $input['user_id'] = $user->id;
            $student = $user->user()->create($input);
            $response = fractal($student, new ShowProfileStudentTransformer())->toArray();
            DB::commit();
            return $this->respondSuccess($response);
        }catch (Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
