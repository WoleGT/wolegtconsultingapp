<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthoredController;
use App\Http\Controllers\HomepageController;


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [HomepageController::class, 'index']);
Route::get('/authored', [AuthoredController::class, 'index']);
Route::get('/paystack/pay', [App\Http\Controllers\PaystackPaymentController::class, 'index'])->name('paystack.index');
Route::post('/paystack/pay', [App\Http\Controllers\PaystackPaymentController::class, 'initiatePayment'])->name('paystack.pay');
Route::get('/paystack/callback', [App\Http\Controllers\PaystackPaymentController::class, 'handleCallback'])->name('paystack.callback');
