<?php

use App\Http\Controllers\CallbackTransactionsController;
use Illuminate\Support\Facades\Route;

Route::post('callback-transactions', [CallbackTransactionsController::class, 'callbackTransactions']);
