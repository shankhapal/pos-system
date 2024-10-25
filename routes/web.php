<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesController; // Make sure to import your SalesController
use App\Http\Controllers\ProductController; // Add import for ProductController
use App\Http\Controllers\CustomerController; // Add import for CustomerController
use App\Http\Controllers\ReportController; // Add import for ReportController
use App\Http\Controllers\SettingsController; // Add import for SettingsController
use App\Http\Controllers\BillingController; // Add import for BillingController

Route::get('/', function () {
    return view('welcome');
});

// Grouping all routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Sales Routes
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index'); // Overview
    Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create'); // New Sale
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store'); // Store Sale

    // Reports Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index'); // Overview of reports
    Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory'); // Define this route

    // Other routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Billing Routesbilling
    Route::get('/billing', [BillingController::class, 'index'])->name('billing.index'); // Overview
    Route::get('/billing/create', [BillingController::class, 'create'])->name('billing.create'); // New Sale
    Route::post('/billing', [BillingController::class, 'store'])->name('billing.store'); // Store Sale

});

// Route to handle authentication
require __DIR__.'/auth.php';