<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\UserStubController;

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

// RESTful stub routes for users (no database operations, in-memory)
Route::apiResource('users_stub', UserStubController::class);

// Full CRUD using Eloquent and database
Route::apiResource('users', UserApiController::class);
Route::apiResource('posts', PostApiController::class);
Route::apiResource('comments', CommentApiController::class);
