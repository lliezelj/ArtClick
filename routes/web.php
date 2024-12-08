<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('customer.landingpage');
})->name('customer.landingpage');


Route::get('/about', function () {
    return view('customer.about');
})->name('about');

Route::get('/profile', function () {
    return view('AM.am-profile');
})->name('am-profile');

Route::get('/super-admin/signin-index', function () {
    return view('AM.am-signin');
})->name('am.signin');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

//outside Routes to access without authentication
Route::get('/customer/shop-category',[App\Http\Controllers\ShopController::class, 'index'])->name('customer.shop');
Route::get('/customer/my-cart',[App\Http\Controllers\CartController::class, 'index'])->name('customer.cart');
Route::get('/customer/gallery/artists',[App\Http\Controllers\ArtistController::class, 'gallery'])->name('customer.gallery');
Route::get('/announcements',[App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::post('/question/create', [App\Http\Controllers\ContactController::class, 'question'])->name('create.question');
Route::get('/customer/categories/{id}/products', [App\Http\Controllers\ShopController::class, 'getProductsByCategory'])->name('customer.getProducts');
Route::get('/customer/item-details/{id}', [App\Http\Controllers\ShopController::class, 'viewProductDetails'])->name('view.details');
Route::get('/sendSms', [App\Http\Controllers\SmsController::class, 'sendSms']);
Route::get('/search/products', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
Route::post('/add-message', [App\Http\Controllers\MessageController::class, 'guestMessage'])->name('add.message');
Route::get('/customer/gallery/{id}/artist-items', [App\Http\Controllers\ArtistController::class, 'getItemsByArtists'])->name('get.items');



Route::group(['middleware' => ['auth', 'verified']], function () {
Route::get('/homepage',[App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/account',[App\Http\Controllers\UsersController::class, 'account'])->name('account');
Route::get('/change-password',[App\Http\Controllers\UsersController::class, 'cpassword'])->name('change.password');
Route::post('/user/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
Route::post('/password-update/{user}', [App\Http\Controllers\UsersController::class, 'updatePassword'])->name('password.update');


//Shop Routes
Route::post('/add-to-cart', [App\Http\Controllers\ShopController::class, 'addToCart'])->name('cart.add');

//Cart Routes

Route::put('/customer/cart/{id}/delete', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('delete.cart');
Route::get('/customer/checkout/{id}',[App\Http\Controllers\CartController::class, 'checkOut'])->name('customer.checkOut');
Route::post('/customer/add-to-order', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('customer.placeOrder');
Route::put('/customer/order/{id}/cancelled', [App\Http\Controllers\CartController::class, 'cancelOrder'])->name('customer.cancel');
Route::get('/customer/view-orders', [App\Http\Controllers\CartController::class, 'viewOrders'])->name('view.orders');
//Gallery Routes

//Announcements Routes


//Contact user-controller


//Review Controller
Route::post('/add-review', [App\Http\Controllers\ReviewsController::class, 'addToReview'])->name('add.review');

});

Route::group(['middleware' => ['auth','verified','admin']], function () {

    // Admin routes here
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

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
    Route::put('/admin/edit/announcement/{id}', [App\Http\Controllers\AnnouncementController::class, 'editAnnouncement'])->name('edit.announcement');
    Route::get('/admin/view/announcemet/details/{id}', [App\Http\Controllers\AnnouncementController::class, 'viewAnnouncement'])->name('view.announcement');

    // orders routes
    Route::get('/admin/orders-list', [App\Http\Controllers\OrdersController::class, 'index'])->name('admin.orders');
    Route::put('/admin/status/edit/{id}', [App\Http\Controllers\OrdersController::class, 'updateOrderStatus'])->name('update.orderStatus');
    Route::get('/admin/orders-dates', [App\Http\Controllers\OrdersController::class, 'orderDateIndex'])->name('admin.orderDateIndex');
    Route::get('/orders/date/{date}', [App\Http\Controllers\OrdersController::class, 'showOrdersByDate'])->name('orders.byDate');

    //Expenses routes
    Route::get('/admin/expenses-list', [App\Http\Controllers\ExpensesController::class, 'index'])->name('admin.expenses');
    Route::post('/admin/add/expense', [App\Http\Controllers\ExpensesController::class, 'addExpense'])->name('add.expense');
    Route::get('/expenses/{year}/{month}', [App\Http\Controllers\ExpensesController::class, 'showExpenseByYearMonth'])->name('expense.details');
    Route::put('/admin/edit/expense/{id}', [App\Http\Controllers\ExpensesController::class, 'editExpense'])->name('edit.expense');
    Route::delete('/admin/expense/{id}/delete', [App\Http\Controllers\ExpensesController::class, 'deleteExpense'])->name('delete.expense');


    // Sales Routes
    Route::get('/admin/daily-sales', [App\Http\Controllers\SalesController::class, 'dailySales'])->name('admin.dailySales');
    Route::get('/admin/sales/{date}', [App\Http\Controllers\SalesController::class, 'getOrdersByDate'])->name('sales.byDate');
    Route::get('/admin/monthly-sales', [App\Http\Controllers\SalesController::class, 'showMonthlySales'])->name('monthly.sales');
    Route::get('/sales/monthly-details', [App\Http\Controllers\SalesController::class, 'showMonthlyDetails'])->name('monthly.details');
    Route::get('/admin/annual-sales', [App\Http\Controllers\SalesController::class, 'showAnnualSales'])->name('annual.sales');
    Route::get('/generate-pdf', [App\Http\Controllers\SalesController::class, 'generatePdf'])->name('generate.pdf');
    Route::get('/generate-pdf/daily-sales', [App\Http\Controllers\SalesController::class, 'generatePdfDailySales'])->name('dailySales.pdf');
    Route::get('/generate-pdf/annual-sales', [App\Http\Controllers\SalesController::class, 'generatePdfAnnualSales'])->name('annualSales.pdf');

    // Users Routes
    Route::get('/view/users', [App\Http\Controllers\UsersController::class, 'index'])->name('view.users');
    Route::post('/admin/add/admin-user', [App\Http\Controllers\UsersController::class, 'addAdmin'])->name('add.admin');

     // Messages Routes
     Route::get('/view/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('view.messages');
     Route::post('/reply/message/{id}', [App\Http\Controllers\MessageController::class, 'replyMessage'])->name('replied.message');
     Route::delete('/delete/message/{id}', [App\Http\Controllers\MessageController::class, 'delete'])->name('delete.message');


});    

















Route::get('/forgot-password', function () {
    return view('customer.forgot-password');
})->name('forgot-password');


Route::get('/announcement', function () {
    return view('customer.announcement');
})->name('announcement');

// Route::get('/contact', function () {
//     return view('customer.contact');
// })->name('contact');

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


Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart');

;

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
