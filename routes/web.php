<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Neighborhood;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource("/gastos", ExpenseController::class);
Route::resource("/bancos", EntityController::class);
Route::resource("/clientes", CustomerController::class);
Route::resource("/productos", ProductController::class);
Route::resource("/ventas", OrderController::class);
Route::resource("/barrios", NeighborhoodController::class)->only(['store', 'update']);
Route::resource("/direcciones", AddressController::class)->only(['store', 'update']);


Route::redirect("/", "/gastos");

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
