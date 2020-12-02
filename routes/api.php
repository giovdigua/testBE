<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorVolumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\VolumController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}', [AuthorController::class, 'show']);
Route::get('authors/{author}/volums', [AuthorVolumController::class,'index']);
Route::get('authors/{author}/volums/{volum}', [AuthorVolumController::class,'show']);


Route::middleware('auth:api')->group(function(){
    Route::apiResource('authors/{author}/volums',AuthorVolumController::class)->except(['index','show']);
    Route::apiResource('authors',AuthorController::class)->except(['index','show']);
});


