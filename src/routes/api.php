<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\SampleController;
use Illuminate\Http\Request;
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


Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::post('posts', [PostController::class, 'create'])->name('posts.create');

Route::post('posts/{id}/comments', [CommentController::class, 'create'])->name('comments.create');
