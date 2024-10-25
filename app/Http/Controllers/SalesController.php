<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        // Logic to display all sales
        // Here you would typically retrieve sales data from the database
        return view('sales.index'); // Ensure you have a view at resources/views/sales/index.blade.php
    }

    public function create()
    {
        // Logic to display the create sale form
        return view('sales.create'); // Ensure you have a view at resources/views/sales/create.blade.php
    }

    public function store(Request $request)
    {
        // Logic to store the new sale
        // Validate and save the sale data

        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Assuming you have a Sale model to save the sale data
        \App\Models\Sale::create($validatedData);

        // return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }
}