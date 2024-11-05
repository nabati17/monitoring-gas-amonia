<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GasLevel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
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
    if(Auth::attempt($credentials, $request->filled('remember'))) {
        // Jika 'Ingat Saya' dicentang, atur cookie remember token
        if ($request->filled('remember')) {
            $user = Auth::user();
            $rememberToken = Str::random(60); // Generate remember token
            $user->remember_token = hash('sha256', $rememberToken);
            Cookie::queue('remember_token', $rememberToken, 2628000); // 1 month expiration (2628000 seconds)
        }
        return redirect()->intended('dashboard')->with('message', 'You are now logged in');
    }
    return redirect('/')->with('message', 'Login details are not valid');
}

    public function register(){
        return view('registerpage');
    }

   public function registersave(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email', // Hapus validasi unique di sini
        'password' => 'required|min:6',
    ]);

    // Check if the email is already registered
    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
        return redirect()->route('register')->with('message', 'Email already registered !!!');
    }

    $data = $request->all();
    $check = $this->create($data);

    // Redirect to login page after successful registration
    return redirect()->route('login')->with('message', 'Registration successful. Please login.');
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

    public function analisis()
{
    $dailyAverage = GasLevel::whereDate('created_at', now()->toDateString())->avg('gas_level');
    $monthlyAverage = GasLevel::whereMonth('created_at', now()->month)->avg('gas_level');
    $yearlyAverage = GasLevel::whereYear('created_at', now()->year)->avg('gas_level');

    return view('analisis', compact('dailyAverage', 'monthlyAverage', 'yearlyAverage'));
}


}