<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index']);

Route::get('/transaksi', [UserController::class, 'transaksi']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboardadmin'])->name('admin.dashboard');
Route::get('/admin/motor', [AdminController::class, 'showMotor'])->name('admin.motor');
Route::get('/admin/tambahmotor', [AdminController::class, 'tambahMotor'])->name('admin.tambahmotor');
Route::post('/admin/motor', [AdminController::class, 'storeMotor'])->name('admin.storemotor');
Route::get('/admin/motor/edit/{id}', [AdminController::class, 'editMotor'])->name('admin.editmotor');
Route::post('/admin/motor/update/{id}', [AdminController::class, 'updateMotor'])->name('admin.updatemotor');
Route::delete('/admin/motor/delete/{id}', [AdminController::class, 'deleteMotor'])->name('admin.deletemotor');
Route::get('/admin/brand', [AdminController::class, 'showBrand'])->name('admin.brand');
Route::get('/admin/tambahmerek', [AdminController::class, 'tambahMerek'])->name('admin.tambahmerek');
Route::post('/admin/brand', [AdminController::class, 'storeMerek'])->name('admin.storemerek');
