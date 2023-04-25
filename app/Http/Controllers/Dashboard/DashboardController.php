<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $suppliers = Supplier::all();
        $drivers = User::where('role', '=', 'driver')->count();
        $requests = Transaction::where('approved', '=', 0)->count();
        $vehicles = Vehicle::count();
        $products = Product::count();
        $currentSuppliers = Supplier::where('quantity', '>', 0)->get();
        $totalLPOs = Supplier::sum('quantity');
        return view('dashboard', compact('suppliers', 'drivers', 'requests', 'vehicles', 'products', 'currentSuppliers', 'totalLPOs'));
    }
}
