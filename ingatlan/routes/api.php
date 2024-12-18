<?php

use App\Http\Controllers\IngatlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ingatlan',[IngatlanController::class,'osszeasAdat']);

Route::post('/ingatlan',[IngatlanController::class,'postIngatlanok']);

Route::delete('/ingatlan',[IngatlanController::class, 'deleteIngatlan']);
