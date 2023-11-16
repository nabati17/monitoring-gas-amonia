<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    //
    public function index(){
        return view('loginpage');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('message', 'You are now logged in');
        }
        return redirect('/')->with('message', 'Login details are not valid cuy');
    }

    public function register(){
        return view('registerpage');
    }

    public function registersave(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $data = $request->all();
    $check = $this->create($data);

    // Redirect to login page after successful registration
    return redirect('login')->with('message', 'Registration successful. Please login.');
}

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/'); 
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
