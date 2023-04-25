<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        return view('auth.admin.addProduct');
    }

    function store(Request $request){
        $validatedData = $request -> validate([
            'name' => ['required', 'string']
        ]);

        Product::create($validatedData);

        return redirect()->intended('fuel');
    }
}
