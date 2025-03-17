<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;

Route::get('/signin', [UserController::class, 'loginForm']);
Route::post('/signin', [UserController::class, 'signin']);
Route::post('/signout', [UserController::class, 'signout']);

Route::get('/', [RequestController::class, 'list']);
Route::get('/request/{id}', [RequestController::class, 'detail']);
Route::get('/edit/{id?}', [RequestController::class, 'form']);
Route::post('/approval', [RequestController::class, 'approval']);
Route::post('/create', [RequestController::class, 'create']);
Route::post('/update', [RequestController::class, 'update']);
Route::post('/delete', [RequestController::class, 'delete']);