<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    abort(404);
});

Route::get('/', [UserController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/riwayat-transaksi', [UserController::class, 'riwayatTransaksi'])->name('user.riwayat_transaksi');
    Route::post('/transaksi/store', [UserController::class, 'storeTransaksi'])->name('user.storeTransaksi');
    Route::get('/transaksi/{id}', [UserController::class, 'transaksi'])->name('transaksi');
    Route::get('/transaksi/{id}/bayar', [UserController::class, 'formPembayaran'])->name('user.pembayaran');
    Route::post('/transaksi/{id}/bayar', [UserController::class, 'prosesPembayaran'])->name('user.prosesPembayaran');
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/update-foto', [UserController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::post('/transaksi/store', [UserController::class, 'storeTransaksi'])->name('user.storeTransaksi');
    Route::get('/riwayat-transaksi', [UserController::class, 'riwayatTransaksi'])->name('user.riwayat_transaksi');
    Route::get('/transaksi/{id}', [UserController::class, 'transaksi'])->name('transaksi');
});

// Halaman admin (Khusus untuk role admin)
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardadmin'])->name('admin.dashboard');

    // Kelola Motor
    Route::get('/admin/motor', [AdminController::class, 'showMotor'])->name('admin.motor'); // List motor
    Route::get('/admin/tambahmotor', [AdminController::class, 'tambahMotor'])->name('admin.motor.create'); // Form tambah motor
    Route::post('/admin/motor', [AdminController::class, 'storeMotor'])->name('admin.storemotor'); // Simpan motor baru
    Route::get('/admin/motor/edit/{id}', [AdminController::class, 'editMotor'])->name('admin.editmotor'); // Form edit motor
    Route::post('/admin/motor/update/{id}', [AdminController::class, 'updateMotor'])->name('admin.updatemotor'); // Update motor
    Route::delete('/admin/motor/delete/{id}', [AdminController::class, 'deleteMotor'])->name('admin.deletemotor'); // Hapus motor

    // Kelola Transaksi
    Route::get('/admin/transaksiadm', [AdminController::class, 'showTransaksiadm'])->name('admin.transaksiadm'); // List transaksi admin
    Route::post('/admin/transaksi/confirm/{id}', [AdminController::class, 'confirmTransaksi'])->name('admin.transactions.confirm'); // Konfirmasi transaksi
    Route::post('/admin/transaksi/cancel/{id}', [AdminController::class, 'cancelTransaksi'])->name('admin.transactions.cancel'); // Batalkan transaksi
    Route::get('/admin/transaksi/edit-status/{id}', [AdminController::class, 'editStatusTransaksi'])->name('admin.edit_status_transaksi'); // Edit status transaksi
    Route::post('/admin/transaksi/update-status/{id}', [AdminController::class, 'updateStatusTransaksi'])->name('admin.update_status_transaksi');
    Route::delete('/admin/transaksi/delete/{id}', [AdminController::class, 'deleteTransaksi'])->name('admin.deletetransaksi');
    Route::get('/admin/kelola-akun', [AdminController::class, 'showKelolaAkun'])->name('admin.kelola-akun');

    // Kelola Merek/Brand
    Route::get('/admin/brand', [AdminController::class, 'showBrand'])->name('admin.brand'); // List merek
    Route::get('/admin/tambahmerek', [AdminController::class, 'tambahMerek'])->name('admin.brand.create'); // Form tambah merek
    Route::post('/admin/brand', [AdminController::class, 'storeMerek'])->name('admin.brand.store'); // Simpan merek baru
});
