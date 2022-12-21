<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Anggota\BendaharaController;
use App\Http\Controllers\Anggota\SekretarisController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Anggota\TampilanAnggotaController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'auth'])->name('login.post');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.post');

    Route::get('password/forgot', [ForgotPasswordController::class, 'index'])->name('forgot.password');
    Route::post('password/forgot', [ForgotPasswordController::class, 'store'])->name('forgot.password.post'); 
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'index'])->name('reset.password');
    Route::post('password/reset', [ResetPasswordController::class, 'store'])->name('reset.password.post');
});

 /**
  * harusnya saat dia bukan anggota ditampilin "menunggu konfirmasi admin, tolong tunggu beberapa saat, jika merasa salah hubungi contact person"
  * kalo dia anggota tampilin data data nya
  * kalo dia bendahara / serketaris tampilin kas sama manage siswa nya
  * kalo dia ketua / wakil tampilin semua kecuali poin pertama
  *
  */
Route::middleware(['auth', 'checkAnggota'])->prefix('anggota')->name('anggota.')->group(function () {
    Route::get('/', [TampilanAnggotaController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'anggotaInti'], function () {
        Route::prefix('kas')->name('kas.')->group(function () {
            Route::get('/', [BendaharaController::class, 'index'])->name('index');
        });

        Route::prefix('manage')->name('manage.')->group(function () {
            Route::get('/', [SekretarisController::class, 'index'])->name('index');
        });
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

});
