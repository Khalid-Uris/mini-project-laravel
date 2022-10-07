<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\CreditCardController;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
});

Route::get('/bank', [BankController::class, 'index']);
Route::post('/bank-store', [BankController::class, 'store']);
Route::get('/bank/{id}', [BankController::class, 'show']);
Route::put('/bank-update/{id}', [BankController::class, 'update']);
Route::delete('/bank-delete/{id}', [BankController::class, 'destroy']);


Route::get('/credit-card', [CreditCardController::class, 'index']);
Route::post('/credit-card', [CreditCardController::class, 'store']);
Route::get('/credit-card/{id}', [CreditCardController::class, 'show']);
Route::put('/credit-card/{id}', [CreditCardController::class, 'update']);
Route::delete('/credit-card/{id}', [CreditCardController::class, 'destroy']);