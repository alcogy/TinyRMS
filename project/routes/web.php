<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/list', [UserController::class, 'list']);
Route::get('/user/detail/{id}', [UserController::class, 'detail']);
Route::get('/user/create', [UserController::class, 'register']);
Route::post('/user/create', [UserController::class, 'create']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/delete', [UserController::class, 'delete']);