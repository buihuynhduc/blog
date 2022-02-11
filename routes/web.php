<?php

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
    return view('welcome');
});
//--admin
Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');

    });
    Route::prefix('user')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
        Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');

    });
    Route::prefix('post')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.post');
        Route::get('/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.update');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.post.delete');

    });
    Route::prefix('contact')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contact');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'delete'])->name('admin.contact.delete');

    });


});

