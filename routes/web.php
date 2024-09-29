<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TableReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TicketsController;

// redirect to '/' if not logged in
Auth::routes(
    [
        'register' => true,
        'verify' => true
    ]
);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets');
Route::get('/shop', [ShopController::class, 'index'])->name('tickets');
Route::get('/table-available-times/{id}', [TableReservationController::class, 'available_times'])->name('available_times');
Route::post('/reserve-table', [TableReservationController::class, 'reserve_table'])->name('reserve_table');
Route::post('/create-order', [ProductOrderController::class, 'create_order'])->name('create_order');
Route::get('/order-place/{order_id}', [ProductOrderController::class, 'orders_placed'])->name('orders_placed');

// group admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', "admin", "verified"]
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users_list'])->name('admin.users_list');
    Route::get('/users/{id}', [AdminController::class, 'user_detail'])->name('admin.users.show');

    Route::get('/events', [AdminController::class, 'events_list'])->name('admin.events_list');
    Route::post('/create-event', [AdminController::class, 'create_event'])->name('admin.create_event');
    Route::post('/edit-event', [AdminController::class, 'edit_event'])->name('admin.edit_event');
    Route::post('/create-event-venue', [AdminController::class, 'create_event_venue'])->name('admin.create_event_venue');
    Route::get('/team', [AdminController::class, 'team_list'])->name('admin.team_list');
    Route::post('/add-member', [AdminController::class, 'add_member'])->name('admin.add_member');
    Route::post('/edit-member', [AdminController::class, 'edit_member'])->name('admin.edit_member');
    Route::get('/professionals', [AdminController::class, 'professionals_list'])->name('admin.professionals_list');
    Route::post('/add-professional', [AdminController::class, 'add_professional'])->name('admin.add_professional');
    Route::post('/edit-professional', [AdminController::class, 'edit_professional'])->name('admin.edit_professional');
    Route::get('/playlist', [AdminController::class, 'playlist'])->name('admin.playlist');
    Route::post('/add-media', [AdminController::class, 'add_media'])->name('admin.add_media');
    Route::post('/edit-media', [AdminController::class, 'edit_media'])->name('admin.edit_media');
    Route::get('/sponsors', [AdminController::class, 'sponsors'])->name('admin.sponsors');
    Route::post('/add-sponsors', [AdminController::class, 'add_sponsor'])->name('admin.add_sponsor');
    Route::post('/edit-sponsors', [AdminController::class, 'edit_sponsor'])->name('admin.edit_sponsor');
    Route::post('/update-sponsor-rank', [AdminController::class, 'update_sponsor_rank'])->name('admin.update_sponsor_rank');
    Route::get('/news', [AdminController::class, 'news_list'])->name('admin.news');
    Route::post('/add-news', [AdminController::class, 'add_news'])->name('admin.add_news');
    Route::post('/edit-news', [AdminController::class, 'edit_news'])->name('admin.edit_news');
    Route::post('/create-category', [AdminController::class, 'create_category'])->name('admin.create_category');
    Route::post('/update-category', [AdminController::class, 'update_category'])->name('admin.update_category');
    Route::get('/merchandise-categories', [AdminController::class, 'merchandise_categories'])->name('admin.merchandise_categories');
    Route::get('/merchandise', [AdminController::class, 'merchandise'])->name('admin.merchandise');
    Route::get('/merch-orders', [AdminController::class, 'merch_orders'])->name('admin.merch_orders');
    Route::post('/add-product', [AdminController::class, 'add_product'])->name('admin.add_product');
    Route::post('/edit-product', [AdminController::class, 'edit_product'])->name('admin.edit_product');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/update-settings', [AdminController::class, 'update_settings'])->name('admin.update_settings');
    Route::get('/contact', [AdminController::class, 'messages'])->name('admin.contact');
    Route::get('/contact/{id}', [AdminController::class, 'contact_details'])->name('admin.contact-details');
    Route::get('/tables', [AdminController::class, 'tables'])->name('admin.tables');
    Route::post('/add-table', [AdminController::class, 'add_table'])->name('admin.add-table');
    Route::get('/table-details/{id}', [AdminController::class, 'table_details'])->name('admin.table-details');

    Route::get('/privacy-policy', [AdminController::class, 'privacy_policy'])->name('admin.privacy-policy');
    Route::post('/update-privacy-policy', [AdminController::class, 'update_privacy_policy'])->name('admin.update-privacy-policy');
    Route::get('/terms-and-conditions', [AdminController::class, 'terms_and_conditions'])->name('admin.terms-and-conditions');
    Route::post('/update-terms-and-conditions', [AdminController::class, 'update_terms_and_conditions'])->name('admin.update-terms-and-conditions');
    Route::get('/delivery-policy', [AdminController::class, 'delivery_policy'])->name('admin.delivery-policy');
    Route::post('/update-delivery-policy', [AdminController::class, 'update_delivery_policy'])->name('admin.update-delivery-policy');
    Route::get('/return-policy', [AdminController::class, 'return_policy'])->name('admin.return-policy');
    Route::post('/update-return-policy', [AdminController::class, 'update_return_policy'])->name('admin.update-return-policy');
});
