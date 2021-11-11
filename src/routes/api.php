<?php

use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });


Route::get('posts/{id}', [PostApiController::class, 'show'])->name('api.posts.show');
Route::get('posts', [PostApiController::class, 'index'])->name('api.posts.index');
Route::post('posts', [PostApiController::class, 'create'])->name('api.posts.create');

Route::post('posts/{id}/comments', [CommentApiController::class, 'create'])->name('api.comments.create');
