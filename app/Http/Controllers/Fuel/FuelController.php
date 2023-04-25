<?php

namespace App\Http\Controllers\Fuel;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    function index(){
        $suppliers = Supplier::all();
        return view('auth.admin.fuel', compact('suppliers'));
    }
}
