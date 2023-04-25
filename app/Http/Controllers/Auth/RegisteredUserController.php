<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'photo' => ['file', 'mimes:png,jpg', 'max:5000']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->password = Hash::make($request->password);
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $user->photo = '/storage/'.$path;

        $user->save();

        return redirect()->intended('users')->with('success', 'User added successfully');
    }

    function edit($id){
        $user = User::find($id);
        return view('auth.admin.editUser', compact('user'));
    }

    function update(Request $request){
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->dob = $request->dob;
        if($request->hasFile('photo')){
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $user->photo = '/storage/'.$path;
        }
        $user->save();

        return redirect()->intended('users')->with('success', 'User updated successfully');
    }

    function driverInfo(){
        return view('auth.driver.personal');
    }
}
