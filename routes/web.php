<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.homepage');
});

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {


});




Route::get('/forgot-password', function () {
    return view('customer.forgot-password');
})->name('forgot-password');

Route::get('/homepage', function () {
    return view('customer.homepage');
})->name('homepage');


Route::get('/announcement', function () {
    return view('customer.announcement');
})->name('announcement');

Route::get('/contact', function () {
    return view('customer.contact');
})->name('contact');

Route::get('/shop-category', function () {
    return view('customer.shop-category');
})->name('shop-category');

Route::get('/shop-items', function () {
    return view('customer.shop-items');
})->name('shop-items');

Route::get('/items', function () {
    return view('customer.items');
})->name('items');

Route::get('/items-details', function () {
    return view('customer.items-details');
})->name('items-details');

Route::get('/gallery', function () {
    return view('customer.gallery');
})->name('gallery');

Route::get('/gallery-items', function () {
    return view('customer.gallery-items');
})->name('gallery-items');

Route::get('/about', function () {
    return view('customer.about');
})->name('about');

Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart');

Route::get('/account', function () {
    return view('customer.account');
})->name('account');

Route::get('/checkout', function () {
    return view('customer.checkout');
})->name('checkout');




# FOR ADMIN & MANAGER
Route::get('/am-items-category', function () {
    return view('AM.am-items-category');
})->name('am-items-category');

Route::get('/am-items', function () {
    return view('AM.am-items');
})->name('am-items');

Route::get('/am-items-details', function () {
    return view('AM.am-items-details');
})->name('am-items-details');

Route::get('/am-inventory', function () {
    return view('AM.am-inventory');
})->name('am-inventory');

Route::get('/am-restock', function () {
    return view('AM.am-restock');
})->name('am-restock');

Route::get('/am-restock-details', function () {
    return view('AM.am-restock-details');
})->name('am-restock-details');

Route::get('/am-orders-dates', function () {
    return view('AM.am-orders-dates');
})->name('am-orders-dates');

Route::get('/am-orders-details', function () {
    return view('AM.am-orders-details');
})->name('am-orders-details');

Route::get('/am-expenses', function () {
    return view('AM.am-expenses');
})->name('am-expenses');

Route::get('/am-expenses', function () {
    return view('AM.am-expenses');
})->name('am-expenses');

Route::get('/am-expenses-details', function () {
    return view('AM.am-expenses-details');
})->name('am-expenses-details');

Route::get('/am-sales-daily', function () {
    return view('AM.am-sales-daily');
})->name('am-sales-daily');

Route::get('/am-sales-daily-details', function () {
    return view('AM.am-sales-daily-details');
})->name('am-sales-daily-details');

Route::get('/am-sales-monthly', function () {
    return view('AM.am-sales-monthly');
})->name('am-sales-monthly');

Route::get('/am-sales-monthly-details', function () {
    return view('AM.am-sales-monthly-details');
})->name('am-sales-monthly-details');

Route::get('/am-sales-annually', function () {
    return view('AM.am-sales-annually');
})->name('am-sales-annually');



Route::get('/am-artist', function () {
    return view('AM.am-artist');
})->name('am-artist');

Route::get('/am-announcement', function () {
    return view('AM.am-announcement');
})->name('am-announcement');

Route::get('/am-announcement-details', function () {
    return view('AM.am-announcement-details');
})->name('am-announcement-details');

Route::get('/am-users', function () {
    return view('AM.am-users');
})->name('am-users');

Route::get('/am-users', function () {
    return view('AM.am-users');
})->name('am-users');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
