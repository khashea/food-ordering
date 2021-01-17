<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

Route::get('/', function(){
    return view('welcome');
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ItemController::class, 'index'])->name('home');
    Route::get('item-img/{id}', [ItemController::class, 'get_image'])->name('item.image');

    Route::get('/item', [ItemController::class, 'index'])->name('item');
//Route::get('/item/{item}',[ItemController::class,'show'])->name('item.show');
    Route::get('/show-item', [ItemController::class, 'create'])->name('item.create');
    Route::post('/store-item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/edit-item/{item}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item-update/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item-destroy/{item}', [ItemController::class, 'destroy'])->name('item.destroy');


    Route::get('/user', [UserController::class, 'index'])->name('user');
//Route::get('/user/{user}',[UserController::class,'show'])->name('user.show');
    Route::get('/show-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user-update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/order', [OrderController::class, 'index'])->name('order');
//Route::get('/order/{order}',[OrderController::class,'show'])->name('order.show');
    Route::get('/create-order/{item}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/store-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/edit-order/{order}', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order-update/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/order-destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');



    Route::get('/report',[ReportController::class,'index'])->name('report');

});

   // Route::get('/order',[OrderController::class,'index'])->name('order.index');
    //Route::get('/user',[UserController::class,'index'])->name('user.index');


//Route::resource('/Order', 'OrderController');
//   Route::resource('/Item', 'ItemController');
//    Route::resource('/User', 'UserController');
//    Route::resource('/report', 'ReportController');

