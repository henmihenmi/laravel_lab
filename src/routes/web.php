<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\GoodbyeController;
use App\Http\Controllers\UserController;
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
Route::get('/user', [UserController::class, 'index']);
Route::get('/goodbye', [GoodbyeController::class, 'index']);
Route::get('/bbs', [BbsController::class, 'index']);
