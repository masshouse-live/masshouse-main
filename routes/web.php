<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

// group admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', "admin"]

], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users_list'])->name('admin.users_list');
    Route::get('/users/{id}', [AdminController::class, 'user_detail'])->name('admin.users.show');

    Route::get('/events', [AdminController::class, 'events_list'])->name('admin.events_list');
    Route::post('/create-event', [AdminController::class, 'create_event'])->name('admin.create_event');
    Route::post('/create-event-venue', [AdminController::class, 'create_event_venue'])->name('admin.create_event_venue');
    Route::get('/team', [AdminController::class, 'team_list'])->name('admin.team_list');
    Route::post('/add-member', [AdminController::class, 'add_member'])->name('admin.add_member');
    Route::get('/professionals', [AdminController::class, 'professionals_list'])->name('admin.professionals_list');
    Route::post('/add-professional', [AdminController::class, 'add_professional'])->name('admin.add_professional');
    Route::get('/playlist', [AdminController::class, 'playlist'])->name('admin.playlist');
    Route::get('/add-media', [AdminController::class, 'add_media'])->name('admin.add_media');
    Route::get('/sponsors', [AdminController::class, 'sponsors'])->name('admin.sponsors');
    Route::post('/add-sponsors', [AdminController::class, 'add_sponsor'])->name('admin.add_sponsor');
    Route::post('/update-sponsor-rank', [AdminController::class, 'update_sponsor_rank'])->name('admin.update_sponsor_rank');
    Route::get('/news', [AdminController::class, 'news_list'])->name('admin.news');
    Route::post('/add-news', [AdminController::class, 'add_news'])->name('admin.add_news');
    Route::get('/merchandise', [AdminController::class, 'merchandise'])->name('admin.merchandise');
    Route::post('/add-product', [AdminController::class, 'add_product'])->name('admin.add_product');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/update-settings', [AdminController::class, 'update_settings'])->name('admin.update_settings');
    Route::get('/contact', [AdminController::class, 'messages'])->name('admin.contact');

    Route::get('/privacy-policy', [AdminController::class, 'privacy_policy'])->name('admin.privacy-policy');
    Route::get('/terms-and-conditions', [AdminController::class, 'terms_and_conditions'])->name('admin.terms-and-conditions');
    Route::get('/delivery-policy', [AdminController::class, 'delivery_policy'])->name('admin.delivery-policy');
    Route::get('/return-policy', [AdminController::class, 'return_policy'])->name('admin.return-policy');
});
