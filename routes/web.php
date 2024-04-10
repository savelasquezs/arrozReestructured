<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ExpenseController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource("/gastos", ExpenseController::class);
Route::resource("/bancos", EntityController::class);
Route::resource("/clientes", CustomerController::class);

Route::redirect("/", "/gastos");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
