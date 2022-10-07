<?php

use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Models\CreditCard;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Login Route

Route::get('/', [UserController::class, 'index'])->name('login.index');
Route::post('/login-check', [UserController::class, 'login'])->name('login-check.login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout.user');

Route::middleware(['user'])->group(function () {
    //Route::view('bank', 'bank/insert');
    Route::get('/bank', [BankController::class, 'index'])->name('bank.index');
    Route::post('/bank', [BankController::class, 'store'])->name('bank.store');
    Route::get('/bank-show', [BankController::class, 'show'])->name('bank.show');
    Route::get('/bank-edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
    Route::post('/bank/{id}', [BankController::class, 'update'])->name('bank.update');
    Route::get('/bank/{id}', [BankController::class, 'destroy'])->name('bank.destroy');

    //Credit Card Route
    Route::get('/credit-card', [CreditCardController::class, 'index'])->name('credit-card.index');
    Route::post('/credit-card', [CreditCardController::class, 'store'])->name('credit-card.store');
    Route::get('/credit-card-show', [CreditCardController::class, 'show'])->name('credit-card.show');
    Route::get('/credit-card-edit/{id}', [CreditCardController::class, 'edit'])->name('credit-card.edit');
    Route::post('/credit-card/{id}', [CreditCardController::class, 'update'])->name('credit-card.update');
    Route::get('/credit-card/{id}', [CreditCardController::class, 'destroy'])->name('credit-card.destroy');
});