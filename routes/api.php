<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MPESAController;
use App\Http\Controllers\payments\mpesa\MpesaResponseController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/save-daraja-details', [MPESAController::class, 'home']);
Route::get('/get-apps', [MPESAController::class, 'getApps']);

Route::get('/at', [MPESAController::class, 'getAccessToken']);
Route::post('/register', [MPESAController::class, 'registerUrls']);
Route::post('/simulate', [MPESAController::class, 'simulateTransaction']);
Route::post('/stk', [MPESAController::class, 'initiateSTK']);
Route::post('/querystk', [MPESAController::class, 'verifySTKPayment']);


# responses
Route::post('/confirmation', [MpesaResponseController::class, 'confirmation']);
Route::post('/validation', [MpesaResponseController::class, 'validation']);
Route::post('/lnmocallback', [MpesaResponseController::class, 'lnmoCallback']);


