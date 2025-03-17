<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

Route::get('/', [RequestController::class, 'list']);

Route::get('/request/{id}', [RequestController::class, 'detail']);
Route::get('/edit', [RequestController::class, 'form']);
Route::post('/create', [RequestController::class, 'create']);
Route::put('/update', [RequestController::class, 'update']);
Route::delete('/delete', [RequestController::class, 'delete']);