<?php

use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('myexpenses/{email}', [ExpenseController::class, 'getMyExpenses']);