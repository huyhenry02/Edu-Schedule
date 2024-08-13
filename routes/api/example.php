<?php

use App\Http\Controllers\Api\Example\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('example', [ExampleController::class, 'example']);
