<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    function index(){
        $suppliers = Supplier::all();
        return view('auth.admin.addPurchase', compact('suppliers'));
    }

    function store(Request $request){

        $request -> validate([
            'name' => ['required'],
            'amount' => ['required'],
            'supplier' => ['required'],
            'orderNo' => ['required']
        ]);

        $purchase = new Purchase();

        $purchase->name = $request->name;
        $purchase->amount = $request->amount;
        $purchase->date = date('Y-m-d');
        $purchase->supplier = $request->supplier;
        $purchase->orderNo = $request->orderNo;
        $purchase->save();

        return redirect()->intended('fuel');
    }
}
