<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// group admin
Route::group([
    'prefix' => 'admin',
    // 'middleware' => 'auth'
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users_list'])->name('admin.users_list');
    Route::get('/users/{id}', [AdminController::class, 'user_detail'])->name('admin.users.show');
});
