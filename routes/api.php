<?php

use App\Http\Controllers\authentication;
use App\Http\Controllers\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Authentication
Route::post('/login', [authentication::class,'login']);

Route::post('/register',[authentication::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout',[authentication::class,'logout']);


//items controllerc

Route::middleware('auth:sanctum')->post('/items',[items::class,'postItems']);

Route::middleware('auth:sanctum')->get('/items',[items::class,'getItems']);

Route::put('updateItem/{id}', [items::class, 'updateItem'])->middleware('auth:sanctum');