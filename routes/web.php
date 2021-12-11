<?php
namespace App\Http\Controllers;
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

Route::middleware(['auth', 'verified', 'twofactor'])->group( function () {
   Route::get('/', [DashboardController::class, 'index'])->name('home');
});

Route::get('2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
Route::post('2fa', [TwoFactorController::class, 'store'])->name('2fa.store');
Route::get('2fa/reset', [TwoFactorController::class, 'resend'])->name('2fa.resend');



