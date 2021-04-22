<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MPESAController;
use App\Http\Controllers\payments\mpesa\MpesaResponseController;

Route::post('/save-daraja-details', [MPESAController::class, 'home']);
Route::get('/get-apps', [MPESAController::class, 'getApps']);

Route::get('/at', [MPESAController::class, 'getAccessToken']);
Route::post('/register', [MPESAController::class, 'registerUrls']);
Route::post('/simulate', [MPESAController::class, 'simulateTransaction']);
Route::post('/stk', [MPESAController::class, 'initiateSTK']);
Route::post('/querystk', [MPESAController::class, 'verifySTKPayment']);
Route::post('/init-b2c', [MPESAController::class, 'sendB2C']);


# responses
Route::post('/confirmation', [MpesaResponseController::class, 'confirmation']);
Route::post('/validation', [MpesaResponseController::class, 'validation']);
Route::post('/lnmocallback', [MpesaResponseController::class, 'lnmoCallback']);
Route::post('/b2c-timeout', [MpesaResponseController::class, 'b2cTimeout']);
Route::post('/b2c-result', [MpesaResponseController::class, 'b2cCallback']);


