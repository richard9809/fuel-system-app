<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    function index(){
        $vehicles = Vehicle::all();
        return view('auth.admin.vehicles', compact('vehicles'));
    }

    function getAddUserView(){
        $drivers = User::where('role', '=', 'driver')->get();

        return view('auth.admin.addVehicle', compact('drivers'));
    }

    function store(Request $request){
        $request->all();

        $request->validate([
            'manufacturer' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string'],
            'regNo' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'integer'],
            'driver' => ['required', 'string', 'max:255'],
            'photo' => ['file', 'mimes:png,jpg,jpeg', 'max:5000']
        ]);

        $vehicle = new Vehicle();
        $vehicle->manufacturer = $request->manufacturer;
        $vehicle->model = $request->model;
        $vehicle->regNo = $request->regNo;
        $vehicle->mileage = $request->mileage;
        $vehicle->driver = $request->driver;

        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $vehicle->photo = '/storage/'.$path;

        $vehicle->save();

        return redirect()->intended('vehicles')->with('success', 'Vehicle added successfully');
    }

    function edit($id){
        $vehicle = Vehicle::find($id);
        $drivers = User::where('role', '=', 'driver')->get();
        return view('auth.admin.editVehicle', compact('vehicle', 'drivers'));
    }

    function update(Request $request){
        $vehicle = Vehicle::find($request->id);

        $vehicle->manufacturer = $request->manufacturer;
        $vehicle->model = $request->model;
        $vehicle->regNo = $request->regNo;
        $vehicle->mileage = $request->mileage;
        $vehicle->driver = $request->driver;
        $vehicle->save();

        return redirect()->intended('vehicles');
    }

    function getVehicleInfo($id){
        $vehicle = Vehicle::where('driver', '=', $id)->first();
        return view('auth.driver.vehicle', compact('vehicle'));
    }
}
