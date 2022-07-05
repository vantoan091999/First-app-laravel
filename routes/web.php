<?php

;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

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

Route::get('/', [HomeController::class, 'index'])->name("index");
Route::get('/show-product', [HomeController::class, 'show'])->name('show-product');

#login
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration', [UserController::class, 'store']);

Route::prefix('/admin')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');

    #Category
    Route::prefix('/category')->group(function() {

        Route::get('/add', [CategoryController::class, 'add'])->name('category-add');
        Route::post('/add', [CategoryController::class, 'create']);
        Route::get('/list', [CategoryController::class, 'list'])->name('category-list');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/active/{id}', [CategoryController::class, 'active'])->name('category-active');
    });

    #brand
    Route::prefix('/brand')->group(function () {
        Route::get('/add', [BrandController::class, 'add'])->name('brand-add');
        Route::post('/add', [BrandController::class, 'create']);
        Route::get('/list', [BrandController::class, 'list'])->name('brand-list');
        Route::get('/edit/{id}', [BrandController::class, 'show'])->name('brand-edit');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand-delete');
        Route::post('/update/{id}', [BrandController::class, 'update']);
        Route::get('/active/{id}', [BrandController::class, 'active'])->name('brand-active');
    });

    #product
    Route::prefix('/product')->group(function () {
        Route::get('/add', [ProductController::class, 'add'])->name('product-add');
        Route::post('/add', [ProductController::class, 'create']);
        Route::get('/list', [ProductController::class, 'list'])->name('product-list');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product-delete');
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('product-active');
        Route::get('/{id}', [ProductController::class, 'detail'])->name('product-details');
    }); 
});
#cart
Route::post('/view-cart', [CartController::class, 'add'])->name('view-cart');
Route::get('/update-cart', [CartController::class, 'update'])->name('update-cart');
Route::get('/remove-cart', [CartController::class, 'remove'])->name('remove-cart');
