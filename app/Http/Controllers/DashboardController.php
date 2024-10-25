<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Fetch sales data, inventory, and recent transactions
    $salesSummary = [
        'todaySales' => 500,
        'transactions' => 20,
    ];

    $inventory = [
        ['name' => 'Product A', 'stock' => 50],
        ['name' => 'Product B', 'stock' => 20],
        ['name' => 'Product C', 'stock' => 0],
    ];

    $transactions = [
        ['id' => 1, 'customer' => 'John Doe', 'amount' => 500, 'date' => '2024-10-24'],
        ['id' => 2, 'customer' => 'Jane Smith', 'amount' => 300, 'date' => '2024-10-24'],
    ];

    return view('dashboard', compact('salesSummary', 'inventory', 'transactions'));
}

}