<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeOrderController;

Route::post('/exchange-orders', [ExchangeOrderController::class, 'store']);
Route::get('/exchange-orders/{tracking_code}', [ExchangeOrderController::class, 'show']);
