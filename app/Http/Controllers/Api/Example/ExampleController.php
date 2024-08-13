<?php

namespace App\Http\Controllers\Api\Example;

use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

class ExampleController extends ApiController
{
    use AuthorizesRequests, ValidatesRequests;

    public function example(): JsonResponse
    {
        return $this->respond([
            'data' => [
                'message' => 'Hello world!',
            ],
        ]);
    }
}
