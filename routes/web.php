<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    // Users -> Admin
    Route::get('/users', [\App\Http\Controllers\Auth\UsersController::class, 'index'])->name('users');
    Route::get('/addUser', [\App\Http\Controllers\Auth\UsersController::class, 'addUserView'])->name('addUser');
    Route::post('/create-user', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('storeUser');
    Route::get('/editUser/{id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'edit'])->name('editUser');
    Route::put('/updateUser', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update'])->name('updateUser');

    // Vehicles
    Route::get('/vehicles', [\App\Http\Controllers\Vehicle\VehicleController::class, 'index'])->name('vehicles');
    Route::get('/addVehicle', [\App\Http\Controllers\Vehicle\VehicleController::class, 'getAddUserView'])->name('addVehicleView');
    Route::post('/create-vehicle', [\App\Http\Controllers\Vehicle\VehicleController::class, 'store'])->name('create-vehicle');
    Route::get('/editVehicle/{id}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'edit'])->name('editVehicle');
    Route::put('/updateVehicle', [\App\Http\Controllers\Vehicle\VehicleController::class, 'update'])->name('updateVehicle');
    

    // Fuel
    Route::get('/fuel', [\App\Http\Controllers\Fuel\FuelController::class, 'index'])->name('fuel');

    // Supplier
    Route::get('/addSupplier', [\App\Http\Controllers\Supplier\SupplierController::class, 'index'])->name('addSupplier');
    Route::post('/storeFuel', [\App\Http\Controllers\Supplier\SupplierController::class, 'store'])->name('storeSupplier');

    // Product
    Route::get('/addProduct', [\App\Http\Controllers\Product\ProductController::class, 'index'])->name('addProduct');
    Route::post('/storeProduct', [\App\Http\Controllers\Product\ProductController::class, 'store'])->name('storeProduct');

    // Purchases
    Route::get('/addPurchase', [\App\Http\Controllers\Purchase\PurchaseController::class, 'index'])->name('addPurchase');
    Route::post('/storePurchase', [\App\Http\Controllers\Purchase\PurchaseController::class, 'store'])->name('storePurchase');

    // Transactions
    Route::get('/approve/{id}', [\App\Http\Controllers\Transaction\TransactionController::class, 'approveView'])->name('approve');
    Route::put('storeApproval', [\App\Http\Controllers\Transaction\TransactionController::class, 'storeApproval'])->name('storeApproval');
    Route::get('/detail-order/{id}', [\App\Http\Controllers\Transaction\TransactionController::class, 'detailOrderView'])->name('detailOrder');
    Route::put('/storeDetailOrder', [\App\Http\Controllers\Transaction\TransactionController::class, 'storeDetailOrder'])->name('storeDetailOrder');
    Route::get('/reject/{id}', [\App\Http\Controllers\Transaction\TransactionController::class, 'getRejectView'])->name('rejectView');
    Route::put('/rejectTransaction', [\App\Http\Controllers\Transaction\TransactionController::class, 'rejectTransaction'])->name('rejectTransaction');
    Route::get('/transactions', [\App\Http\Controllers\Transaction\TransactionController::class, 'getTransactions'])->name('transactions');

    // Users -> Driver
    Route::get('/personal', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'driverInfo'])->name('personalInfo');
    Route::get('/vehicle/{id}', [\App\Http\Controllers\Vehicle\VehicleController::class, 'getVehicleInfo'])->name('vehicleInfo');
    Route::get('/request/{id}', [\App\Http\Controllers\Transaction\TransactionController::class, 'index'])->name('request');
    Route::post('/store', [\App\Http\Controllers\Transaction\TransactionController::class, 'store'])->name('storeRequest');
    Route::get('/status', [\App\Http\Controllers\Transaction\TransactionController::class, 'status'])->name('status');
    Route::get('/driverReports', [\App\Http\Controllers\Transaction\TransactionController::class, 'getDriverReports'])->name('driverReports');

    // Reports
    Route::get('/reports', [\App\Http\Controllers\Transaction\TransactionController::class, 'getReports'])->name('reports');
});

require __DIR__.'/auth.php';
