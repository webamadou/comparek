<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BankProductController;
use App\Http\Controllers\Admin\ProductOfferController;

Route::apiResource('banks', BankController::class);
Route::apiResource('bank-products', BankProductController::class);
Route::apiResource('product-offers', ProductOfferController::class);
