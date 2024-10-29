<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', function () {
return view('customer.landingpage');
});
Route::group(['middleware' => ['auth', 'verified']], function () {
Route::get('/homepage',[App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

//Shop Routes
Route::get('/customer/shop-category',[App\Http\Controllers\ShopController::class, 'index'])->name('customer.shop');
Route::get('/customer/categories/{id}/products', [App\Http\Controllers\ShopController::class, 'getProductsByCategory'])->name('customer.getProducts');
Route::get('/customer/item-details/{id}', [App\Http\Controllers\ShopController::class, 'viewProductDetails'])->name('view.details');
Route::post('/add-to-cart', [App\Http\Controllers\ShopController::class, 'addToCart'])->name('cart.add');

//Cart Routes
Route::get('/customer/my-cart',[App\Http\Controllers\CartController::class, 'index'])->name('customer.cart');
Route::put('/customer/cart/{id}/delete', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('delete.cart');
Route::get('/customer/checkout/{id}',[App\Http\Controllers\CartController::class, 'checkOut'])->name('customer.checkOut');
Route::post('/customer/add-to-order', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('customer.placeOrder');
Route::put('/customer/order/{id}/cancelled', [App\Http\Controllers\CartController::class, 'cancelOrder'])->name('customer.cancel');

//Gallery Routes
Route::get('/customer/gallery/artists',[App\Http\Controllers\ArtistController::class, 'gallery'])->name('customer.gallery');
Route::get('/customer/gallery/{id}/artist-items', [App\Http\Controllers\ArtistController::class, 'getItemsByArtists'])->name('get.items');


//Announcements Routes
Route::get('/announcements',[App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements');
});

Route::group(['middleware' => ['auth','verified','admin']], function () {
    // Admin routes here
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    //category routes
    Route::get('/admin/category-list', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category-add', [App\Http\Controllers\CategoryController::class, 'categoryStore'])->name('add.category');
    Route::get('/admin/categories/{id}/products', [App\Http\Controllers\CategoryController::class, 'getProductsByCategory'])->name('get.products');
    Route::put('/admin/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('update.category');
    Route::delete('/admin/category/{id}/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete.category');

    //items/products routes
    Route::get('/admin/items-list', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.product');
    Route::post('/admin/product-add', [App\Http\Controllers\ProductController::class, 'productStore'])->name('add.product');
    Route::get('/admin/item-details/{id}', [App\Http\Controllers\ProductController::class, 'viewProduct'])->name('view.product');
    Route::put('/admin/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update.product');
    Route::delete('/admin/product/{id}/delete', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('delete.product');


    //Artist routes
    Route::get('/admin/artists-list', [App\Http\Controllers\ArtistController::class, 'index'])->name('admin.artist');
    Route::get('/admin/artist/{id}/artworks', [App\Http\Controllers\ArtistController::class, 'getArtworksByArtists'])->name('get.artworks');
    Route::post('/admin/artist-add', [App\Http\Controllers\ArtistController::class, 'storeArtist'])->name('add.artist');
    Route::put('/admin/artist/{id}/update', [App\Http\Controllers\ArtistController::class, 'updateArtist'])->name('update.artist');
    Route::delete('/admin/artist/{id}/delete', [App\Http\Controllers\ArtistController::class, 'deleteArtist'])->name('delete.artist');

    //Inventory routes
    Route::get('/admin/inventory-list', [App\Http\Controllers\InventoryController::class, 'index'])->name('admin.inventory');
    Route::post('/admin/add-stock/inventory', [App\Http\Controllers\InventoryController::class, 'addStock'])->name('add.stock');
    Route::put('/admin/stock-inventory/{id}/update', [App\Http\Controllers\InventoryController::class, 'updateStock'])->name('update.stock');
    Route::delete('/admin/stock/inventory/{id}/delete', [App\Http\Controllers\InventoryController::class, 'stockDelete'])->name('delete.stock');

    //Restock History routes
    Route::get('/admin/restock/history', [App\Http\Controllers\RestockController::class, 'index'])->name('admin.restock');
    Route::get('/am-restock-details/{date}', [App\Http\Controllers\RestockController::class, 'restockDetails'])->name('am-restock-details');

    //Announcements
    Route::get('/admin/announcemets', [App\Http\Controllers\AnnouncementController::class, 'adminIndex'])->name('admin.announcement');
    Route::post('/admin/create/announcement', [App\Http\Controllers\AnnouncementController::class, 'announcementStore'])->name('add.announcement');
});

















Route::get('/forgot-password', function () {
    return view('customer.forgot-password');
})->name('forgot-password');


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

// Route::get('/am-restock-details', function () {
//     return view('AM.am-restock-details');
// })->name('am-restock-details');

Route::get('/am-orders-dates', function () {
    return view('AM.am-orders-dates');
})->name('am-orders-dates');

Route::get('/am-orders-details', function () {
    return view('AM.am-orders-list');
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
