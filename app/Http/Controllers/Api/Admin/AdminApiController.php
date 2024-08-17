<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\ApiController;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\CreateAdminRequest;
use App\Modules\User\Transformers\UserShowTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;
use Symfony\Component\HttpFoundation\Response;

class AdminApiController extends ApiController
{
    /**
     * Create Admin
     *
     * @param CreateAdminRequest $request
     * @return JsonResponse
     */
    public function createAdmin(CreateAdminRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->validated();
            $input['password'] = bcrypt($input['password']);
            $input['user_type'] = User::ADMIN_ACCESS;
            $admin = User::create($input);
            $response = fractal($admin, new UserShowTransformer())->toArray();
            DB::commit();
            return $this->respondSuccess($response);
        }catch (Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateInformationStudent()
    {

    }
}
