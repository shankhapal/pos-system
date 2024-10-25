<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Logic to display all reports
        return view('reports.index'); // Ensure this view exists
    }

    public function inventory()
    {
        // Logic to display inventory report
        return view('reports.inventory'); // Ensure this view exists
    }
}