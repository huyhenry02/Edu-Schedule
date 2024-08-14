<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->name('auth')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('.logout');
});
