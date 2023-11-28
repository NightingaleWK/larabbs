<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'root'])->name('root');

Auth::routes(['verify' => true]);

Route::resource('users', UsersController::class)->only([
    'show', 'edit', 'update'
]);

Route::resource('topics', TopicsController::class)->only([
    'index', 'create', 'store', 'update', 'edit', 'destroy'
]);
Route::get('topics/{topic}/{slug?}', [TopicsController::class, 'show'])->name('topics.show');
Route::post('upload_image', [TopicsController::class, 'uploadImage'])->name('topics.upload_image');

Route::resource('categories', CategoriesController::class)->only([
    'show'
]);

Route::resource('replies', RepliesController::class)->only([
    'store', 'destroy'
]);

Route::resource('notifications', NotificationsController::class)->only([
    'index'
]);
