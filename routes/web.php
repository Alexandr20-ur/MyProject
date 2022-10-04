<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function () {

    Route::controller(UserController::class)->group(function() {
        Route::get('/register', 'create')
            ->name('register.create');
        Route::post('register', 'store')
            ->name('register.store');
        Route::get('/login', 'loginForm')
            ->name('login.create');
        Route::post('/login', 'login')
            ->name('login');
    });
});

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')
        ->name('home');
    Route::get('/create', 'create')
        ->name('posts.create');
    Route::post('/', 'store')
        ->name('posts.store');
});

Route::get('/page/about', [PageController::class, 'show'])
    ->name('page.about');
Route::match(['get', 'post'], '/send', [ContactController::class, 'send']);

Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout')->middleware('auth');
Route::middleware(['admin'])->group(function () {

});

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
});
