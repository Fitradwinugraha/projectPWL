<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// User Routes
Route::get('/', [UserController::class, 'index']);

Route::get('/transaksi', [UserController::class, 'transaksi'])->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboardadmin'])->name('admin.dashboard');
Route::get('/motor', [AdminController::class, 'showMotor'])->name('admin.motor');