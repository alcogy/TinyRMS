<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

Route::get('/', function () {
    return view('index');
});

Route::get('/requests/list', [RequestController::class, 'list']);
Route::get('/request/detail/{id}', [RequestController::class, 'detail']);
Route::get('/request/create', [RequestController::class, 'register']);
Route::post('/request/create', [RequestController::class, 'create']);
Route::put('/request/update', [RequestController::class, 'update']);
Route::delete('/request/delete', [RequestController::class, 'delete']);