<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/check', [AuthController::class, 'loginEnter'])->name('login.enter');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('categories', 'Backend\CategoryController');

    Route::resource('expenses', 'Backend\ExpenseController')->except(['show']);
    Route::get('/expenses/download', 'Backend\ExpenseController@downloadExpense')->name('expenses.download');
});

Route::resource('users', 'Backend\UserController')->except(['index', 'update', 'destroy']);