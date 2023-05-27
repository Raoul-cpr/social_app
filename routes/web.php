<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth')->group(function () {
    Route::get('/',  [PostController::class, 'index'])->name('homepage');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::post('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/update_friend', [PostController::class, 'store'])->name('update_friend');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'loginview'])->name('loginview');
Route::get('/register', [AuthController::class, 'registerview'])->name('registerview');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
