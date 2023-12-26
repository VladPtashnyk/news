<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('lang/{locale}', [LocalizationController::class, 'changeLocale'])->name('locale.change');
Route::middleware('set_locale')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('admin/login', [AdminAuthController::class, 'showLoginView'])->name('admin.showLogin');
    Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

    Route::get('user/login', [UserAuthController::class, 'showLoginView'])->name('user.showLogin');
    Route::post('user/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::get('user/register', [UserAuthController::class, 'showRegisterView'])->name('user.showRegister');
    Route::post('user/register', [UserAuthController::class, 'register'])->name('user.register');

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('admin.allUsers');
        Route::delete('/allUsers/user/delete/{idUser}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
        Route::delete('/allUsers/author/delete/{idAuthor}', [AdminController::class, 'deleteAuthors'])->name('admin.deleteAuthors');
        Route::delete('/allNews/news/delete/{idNews}', [AdminController::class, 'deleteNews'])->name('admin.deleteNews');
    });

    Route::middleware('user')->prefix('user')->group(function () {
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
        Route::get('/createNews', [UserController::class, 'create'])->name('user.createNews');
        Route::post('/storeNews', [UserController::class, 'store'])->name('user.storeNews');
        Route::get('/news/show/{idNews}', [UserController::class, 'show'])->name('user.show');
        Route::get('/myNews/{idUser}', [UserController::class, 'myNews'])->name('user.myNews');
        Route::get('myNews/edit/{idNews}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('myNews/update/{idNews}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/myNews/delete/{idNews}', [UserController::class, 'delete'])->name('user.delete');
    });
});
