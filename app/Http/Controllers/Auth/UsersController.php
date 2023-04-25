<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        $users = User::orderBy('DESC');
        return view('auth.admin.users', compact('users'));
    }

    function addUserView(){
        return view('auth.admin.addUser');
    }

}
