<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\socialiteContr;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\checkController;

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

Route::middleware(['admin'])->group(function () {
    Route::get("/adminHome", [productsController::class, "adminIndex"])->name("adminIndex");
    //productscontroller routes
    Route::get("/adminProducts", [productsController::class, "adminProducts"])->name("adminProducts");
    Route::get("/adminProducts/{id}/destroy", [productsController::class, "destroyProducts"])->name("destroyProducts");
    Route::get("/adminProduct/{id}", [productsController::class, "showProduct"])->name("showProduct");
    Route::get("/adminAddProduct", [productsController::class, "addProduct"])->name("AddProduct");
    Route::get("/adminEditProduct/{id}", [productsController::class, "editProduct"])->name("editProduct");
    Route::post("/adminAddProduct", [productsController::class, "store"])->name("storeProduct");
    Route::post("/adminEditProduct", [productsController::class, "updateProduct"])->name("updateProduct");
    //usercontroller routes
    Route::resource('Users', UserController::class);
    //categoriescontroller routes
    Route::resource('categories', CategoryController::class);
    //orderscontroller
    Route::resource('orders', App\Http\Controllers\orderController::class)->except(['index']);

    //order history
    Route::get('/filterAdmin', [checkController::class, 'searchByDate']);
    Route::get('/checks', [checkController::class, 'index'])->name("checks");
    //order status
    Route::get("/adminManualOrder", [orderController::class, "adminManualOrder"])->name("adminManualOrder");
    Route::post('/adminManualOrder/{id}/confirm_order', [orderController::class, 'confirm'])->name('confirm');
});
Route::get('orders', [App\Http\Controllers\orderController::class, 'index'])->name('orders.index');
Route::get('/', function () {

    if (Auth::user()) {
        if (Auth::user()->role != "admin") {
            # code...
            return to_route("indexUser");
        }
        return to_route("adminIndex");
    }
    return view('welcome');
});


Route::get("/userHome", [productsController::class, "index"])->name("indexUser");
//which to use
// Route::get("/myOrderUser", [productsController::class, "orders"])->name("userOrder");
Route::get("/myorder", [orderController::class, "index"])->name("order.index");

Route::post("/addOrder", [UserOrderController::class, "store"])->name("Order.store");
// Route::get("/adminUserDestroy/{id}", [productsController::class, "destroyUser"])->name("destroy");

// Route::get("/adminUser", [productsController::class, "adminUser"])->name("adminUser");
// Route::get("/adminChecks", [productsController::class, "adminChecks"])->name("adminChecks");
// Route::get("/adminAddUser", [productsController::class, "addUser"])->name("addUser");
// Route::get("/adminUserView/{id}", [productsController::class, "view"])->name("view");
// Route::get("/adminUserEdit/{id}", [productsController::class, "editUser"])->name("edit");

// Route::get("userHome",[productsController::class,"index"])->name("index");
// Route::get("myOrderUser",[productsController::class,"orders"])->name("userOrder");
// Route::get("userHome",[productsController::class,"index"])->name("index");
// Route::get("myOrderUser",[productsController::class,"orders"])->name("userOrder");

// Route::resource('orders', App\Http\Controllers\orderController::class);


Route::get('/filter', [orderController::class, 'searchByDate']);

Route::get('/showOrders', [checkController::class, 'showOrders']);
Route::get('/showProducts/{id}', [checkController::class, 'showProducts']);
Route::get("/userOrders", [orderController::class, "index"])->name("order.index");
Route::get("/myorder", [orderController::class, "index"])->name("order.index");


// Route::get("/userOrders", [orderController::class, "index"])->name("order.index");


//Strip

Route::get("/checkOut", [StripeController::class, "checkOut"])->name("checkOut");
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success/{id}', 'App\Http\Controllers\StripeController@success')->name('success');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/google', [socialiteContr::class, 'redirectGoogle']);

Route::get('auth/google/callback', [socialiteContr::class, 'handleGoogleCallback']);
