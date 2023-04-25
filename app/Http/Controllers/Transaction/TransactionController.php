<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Vehicle;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Rules\PendingTransaction;
use App\Rules\ValidOldMileage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function index($id){
        $products = Product::all();
        $vehicle = Vehicle::where('driver', '=', Auth::user()->id)->first();

        return view('auth.driver.request', compact('products', 'vehicle'));
    }

    function store(Request $request){
        $validatedData = $request->validate([
            'quantity' => ['required', 'numeric'],
            'mileage' => [
                'required', 
                'numeric',
                new ValidOldMileage(Auth::user()->id)
            ],
            'wkt_no' => ['required', 'numeric'],
            'driver' => [
                'required',
                new PendingTransaction(Auth::user()->id),
            ],
        ]);

        $transaction = new Transaction();
        $transaction->driver = Auth::user()->id;
        $transaction->vehicle = $request->vehicle;
        $transaction->product = $request->product;
        $transaction->quantity = $request->quantity;
        $transaction->vehicleMileage = $request->mileage;
        $transaction->wkt_no = $request->wkt_no;
        $transaction->requestDate = date('Y-m-d');
        $transaction->save();

        return redirect()->route('status');

    }

    function status(){
        $transaction = Transaction::where('driver', '=', Auth::user()->id)->latest()->first();
        return view('auth.driver.status', compact('transaction'));
    }

    function approveView($id){
        $transaction = Transaction::find($id);
        $suppliers = Supplier::all();
        return view('auth.admin.approve', compact('transaction', 'suppliers'));
    }

    function storeApproval(Request $request){
        $transaction = Transaction::find($request->id);

        $transaction->quantity = $request->quantity;
        $transaction->supplier = $request->supplier;
        $transaction->unitPrice = $request->unitPrice;
        $transaction->approved = 1;
        $transaction->approvedBy = Auth::user()->id;
        $transaction->save();

        return redirect()->intended('fuel');
    }

    function detailOrderView($id){
        $transaction = Transaction::find($id);
        return view('auth.secretary.detailOrder', compact('transaction'));
    }

    function storeDetailOrder(Request $request){
        $transaction = Transaction::find($request->id);

        $transaction->detailOrder = $request->detailOrder;
        $transaction->receipt = $request->receipt;
        $transaction->save();

        return redirect()->intended('dashboard');
    }

    function getTransactions(){
        $transactions = Transaction::select('transactions.*', 'users.name as driver', 'products.name as product', 'vehicles.regNo as vehicle')
                ->leftJoin('users', 'transactions.driver', '=', 'users.id')
                ->leftJoin('products', 'transactions.product', '=', 'products.id')
                ->leftJoin('vehicles', 'transactions.vehicle', '=', 'vehicles.id')
                ->whereDate('transactions.created_at', Carbon::today())
                ->get();
        if($transactions->isEmpty()){
            $message = 'No transactions today';
            return view('auth.admin.transactions', compact('message'));
        }

        return view('auth.admin.transactions', compact('transactions'));
    }

    function getRejectView($id){
        $transaction = Transaction::find($id);
        return view('auth.secretary.reject', compact('transaction'));
    }

    public function rejectTransaction(Request $request)
    {
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($request->id);
    
        // Update the "rejected" field to 1
        $transaction->rejected = $request->rejected;
        $transaction->save();
    
        // Show a success message
        return redirect()->intended('dashboard')->flash('success', 'Transaction rejected successfully!');
    }

    function getReports(){
        return view('auth.admin.reports');
    }

    function getDriverReports(){
        // Get the start and end dates of the current month
        $startDate  = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $transactions = Transaction::join('products', 'transactions.product', '=', 'products.id')
            ->where('driver', '=', Auth::user()->id)
            ->whereBetween('transactions.created_at', [$startDate, $endDate])
            ->latest('transactions.id')
            ->select('transactions.*', 'products.name as product')
            ->get();

        if($transactions->isEmpty()){
            $message = 'No requests for this month';
            return view('auth.driver.reports', compact('message'));
        }
        return view('auth.driver.reports', compact('transactions'));
    }
}
