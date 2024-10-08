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
use App\Http\Controllers\AudioController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PoliciesController;

// redirect to '/' if not logged in
Auth::routes(
    [
        'register' => true,
        'verify' => true
    ]
);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/subscribe-newsletter', [HomeController::class, 'subscribe_newsletter'])->name('subscribe_newsletter');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::post('/send-message', [ContactController::class, 'store'])->name('send_message');
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/blogs-news/{slug}', [NewsController::class, 'news_detail'])->name('news_detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets');
Route::get('/table-available-times/{id}', [TableReservationController::class, 'available_times'])->name('available_times');
Route::post('/reserve-table', [TableReservationController::class, 'reserve_table'])->name('reserve_table');
Route::get('/order-place/{order_id}', [ProductOrderController::class, 'orders_placed'])->name('orders_placed');
Route::get('/audio/{filename}', [AudioController::class, 'streamAudio'])->name('audio.stream');
Route::get('/privacy-policy', [PoliciesController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [PoliciesController::class, 'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/delivery-policy', [PoliciesController::class, 'delivery_policy'])->name('delivery-policy');
Route::get('/cookies-policy', [PoliciesController::class, 'cookies_policy'])->name('cookies-policy');
Route::get('/return-policy', [PoliciesController::class, 'return_policy'])->name('return-policy');

Route::group([
    'prefix' => 'shop'
], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.shop');
    Route::get('/merchandise', [ShopController::class, 'merchandise'])->name('shop.merchandise');
});
Route::group(
    [
        'prefix' => 'cart'
    ],
    function () {
        Route::get('/', [CartController::class, 'viewCart'])->name('cart.checkout');
        Route::post('/place-order', [CartController::class, 'create_order'])->name('cart.create_order');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::get('/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/increment', [CartController::class, 'incrementQuantity'])->name('cart.increment');
        Route::post('/decrement', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
        Route::post('/color-change', [CartController::class, 'changeColor'])->name('cart.color-change');
        Route::post('/size-change', [CartController::class, 'changeSize'])->name('cart.size-change');
    }
);



// group admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', "verified", "admin"]
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users_list'])->name('admin.users_list');
    Route::get('/users/{id}', [AdminController::class, 'user_detail'])->name('admin.users.show');
    Route::get('/newsletter', [AdminController::class, 'newsletter_list'])->name('admin.newsletter_list');
    Route::get('/newsletter/{id}/delete', [AdminController::class, 'delete_subscriber'])->name('admin.delete_subscriber');
    Route::post('/newsletter-unsubscribe', [AdminController::class, 'unsubscribe_newsletter'])->name('admin.unsubscribe_newsletter');

    Route::get('/event-venues', [AdminController::class, 'event_venues'])->name('admin.event_venues');
    Route::get('/events', [AdminController::class, 'events_list'])->name('admin.events_list');
    Route::post('/create-event', [AdminController::class, 'create_event'])->name('admin.create_event');
    Route::post('/edit-event', [AdminController::class, 'edit_event'])->name('admin.edit_event');
    Route::post('/edit-event-venue', [AdminController::class, 'edit_event_venue'])->name('admin.edit_event_venue');
    Route::post('/create-event-venue', [AdminController::class, 'create_event_venue'])->name('admin.create_event_venue');
    Route::get('/team', [AdminController::class, 'team_list'])->name('admin.team_list');
    Route::post('/add-member', [AdminController::class, 'add_member'])->name('admin.add_member');
    Route::post('/edit-member', [AdminController::class, 'edit_member'])->name('admin.edit_member');
    Route::get('/professionals', [AdminController::class, 'professionals_list'])->name('admin.professionals_list');
    Route::get('/professional-events/{id}', [AdminController::class, 'professional_events'])->name('admin.professional-events');
    Route::post('/create-professional-event/{id}', [AdminController::class, 'create_professional_event'])->name('admin.create-professional-event');
    Route::post('/delete-professional-event/{id}', [AdminController::class, 'delete_professional_event'])->name('admin.delete-professional-event');
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
    Route::get('/higlight-category/{id}', [AdminController::class, 'highlight_category'])->name('admin.highlight_category');
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
    Route::get('/terms-and-conditions', [AdminController::class, 'terms_and_conditions'])->name('admin.terms-and-conditions');
    Route::get('/delivery-policy', [AdminController::class, 'delivery_policy'])->name('admin.delivery-policy');
    Route::get('/cookies-policy', [AdminController::class, 'cookies_policy'])->name('admin.cookies-policy');
    Route::get('/return-policy', [AdminController::class, 'return_policy'])->name('admin.return-policy');
    Route::post('/update-privacy-policy', [AdminController::class, 'update_privacy_policy'])->name('admin.update-privacy-policy');
    Route::post('/update-terms-and-conditions', [AdminController::class, 'update_terms_and_conditions'])->name('admin.update-terms-and-conditions');
    Route::post('/update-delivery-policy', [AdminController::class, 'update_delivery_policy'])->name('admin.update-delivery-policy');
    Route::post('/update-return-policy', [AdminController::class, 'update_return_policy'])->name('admin.update-return-policy');
    Route::post('/update-cookies-policy', [AdminController::class, 'update_cookies_policy'])->name('admin.update-cookies-policy');
});
