<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MPESAController;
use App\Http\Controllers\payments\mpesa\MpesaResponseController;



Route::view('/{any}', 'welcome')->where('any', '.*');