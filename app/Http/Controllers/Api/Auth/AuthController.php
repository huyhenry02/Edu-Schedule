<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Modules\User\Models\User;
use App\Modules\User\Requests\SignInRequest;
use App\Modules\User\Transformers\UserShowTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends ApiController
{

    /**
     * Login
     *
     * @param SignInRequest $request
     * @return JsonResponse
     */
    public function login(SignInRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            $user->revokeExistingTokensFor(User::USER_ACCESS_TOKEN);
            $payload['access_token'] = $user->createToken(User::USER_ACCESS_TOKEN)->accessToken;
            $payload['user'] = fractal($user, new UserShowTransformer())->parseIncludes($request->input('includes'))->toArray();
            return $this->respond($payload);
        }

        return $this->respondUnauthorized();
    }

    /**
     * Logout
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        try {
            auth()->user()?->token()?->revoke();
            $response = $this->respondSuccessWithoutData(__('messages.account.logged_out_successfully'));
        } catch (\Exception $e) {
            $response = $this->respondError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return $response;
    }
}
