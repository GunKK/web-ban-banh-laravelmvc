<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\ProductController;
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


Route::get('/', function () {
    return view('customers.home');
})->name('home');

Route::get('/about', function () {
    return view('customers.about');
})->name('about');

Route::get('/contact', function () {
    return view('customers.contact');
})->name('contact');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/sign_up', [RegisterController::class, 'create'])->name('sign_up');
Route::post('/sign_up', [RegisterController::class, 'store'])->name('sign_up.store');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'cart'])->name('cart');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/destroy', [CartController::class, 'remove'])->name('cart.remove');
});
Route::get('/destroy.cart', function() {
    session()->forget('cart');
});

// ----------------------CUSTOMER----------------------------------------------------------------------------------------------------- //
// Route::middleware('web', 'checkCustomer')->prefix('admin')->group(function () {
// });

Route::get('/auth/{social}', [SocialAccountController::class, 'redirectToProvider'])->name('login.{social}');
Route::get('/auth/{social}/callback', [SocialAccountController::class, 'handleProviderCallback'])->name('login.{social}.callback');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/comment/{id}', [CommentController::class, 'forceDelete'])->name('comment.destroy');
Route::post('/comment/replies', [CommentController::class, 'findByParentId'])->name('comment.getReplies');

// ----------------------ADMIN----------------------------------------------------------------------------------------------------- //
Route::middleware('web', 'checkAdmin')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admins.dashboard');
    })->name('dashboard');
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::patch('/{id}', [AdminProductController::class, 'update'])->name('product.update');
        Route::delete('/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/only-trash', [AdminProductController::class, 'onlyTrashed'])->name('product.onlyTrashed');
        Route::post('/{id}/restore', [AdminProductController::class, 'restore'])->name('product.restore');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('category.create');
        Route::post('/', [AdminCategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/only-trash', [AdminCategoryController::class, 'onlyTrashed'])->name('category.onlyTrashed');
        Route::post('/{id}/restore', [AdminCategoryController::class, 'restore'])->name('category.restore');
    });
});