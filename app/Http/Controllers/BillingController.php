<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        // Logic for showing billing overview
        return view('billing.index');
    }

    public function create()
    {
        // Logic for showing the create billing form
        return view('billing.create');
    }

    public function store(Request $request)
    {
        // Logic for storing the billing information
    }
}