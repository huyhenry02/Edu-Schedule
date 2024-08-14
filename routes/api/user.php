<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->name('auth')->prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});
