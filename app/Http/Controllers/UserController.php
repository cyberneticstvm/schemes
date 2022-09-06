<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use DB;

class UserController extends Controller
{
    public function createuser(){
        $input = [];
        $input['name'] = 'Vijoy Sasidharan';
        $input['email'] = 'devuinfosys@gmail.com';
        $input['username'] = 'admin';
        $input['password'] = Hash::make('stupid');
        $input['district'] = 1;
        $input['user_type'] = 'admin';
        $user = User::create($input);
        return redirect()->route('login')->with('success','User created successfully');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user_id = Auth::user()->id;
            return redirect()->route('dash')->with('success','User logged in successfully');
        }  
        return redirect("/login/")->withErrors('Login details are not valid');
    }

    public function logout(){
        Session::flush();
        Auth::logout();  
        return Redirect('/login/');
    }
}
