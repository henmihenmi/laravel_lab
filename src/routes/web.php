<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Github\GithubController;
use App\Http\Controllers\GoodbyeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/goodbye', [GoodbyeController::class, 'index']);
// Route::get('/bbs', [BbsController::class, 'index']);
// Route::post('/bbs', [BbsController::class, 'create']);
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::post('posts', [PostController::class, 'create'])->name('posts.create');

// Route::get('posts/{id}', [CommentController::class, 'index']);
Route::post('posts/{id}/comments', [CommentController::class, 'create'])->name('comments.create');

// Route::get('github', [GithubController::class, 'top']);
// Route::post('github/issue', [GithubController::class, 'createIssue']);
// Route::get('login/github', [LoginController::class, 'redirectToProvider']);
// Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback']);

// Route::post('user', [UserController::class, 'updateUser']);
// Route::get('/', [HomeController::class, 'index']);
// Route::post('/upload', [HomeController::class, 'upload']);
