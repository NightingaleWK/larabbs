<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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


// 首页
Route::get('/', [PagesController::class, 'root'])->name('root');

// 认证脚手架
Auth::routes(['verify' => true]);

// 用户相关
Route::resource('users', UsersController::class, ['only' => ['show', 'update', 'edit']]);
