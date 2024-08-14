<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\SignInRequest;
use App\Modules\User\Transformers\UserShowTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{

    public function login(SignInRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            $payload['access_token'] = $user->createToken(User::USER_ACCESS_TOKEN)->accessToken;
            $payload['user'] = fractal($user, new UserShowTransformer())->parseIncludes($request->input('includes'))->toArray();
            return $this->respond($payload);
        }

        return $this->respondUnauthorized();
    }
}
