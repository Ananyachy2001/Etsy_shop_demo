<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check user role and redirect accordingly
            if ($user->user_role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->user_role === 'Customer') {
                return redirect()->route('customer.dashboard');
            }
        }
    
        // Authentication failed, redirect back with errors
        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }
    

    public function showRegister() {
        return view('auth.register'); // your register blade
    }
    public function register(Request $request)
    {
        // Validation rules for registration form fields
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', // Assuming you want usernames to be unique
            'email' => 'required|string|email|max:255|unique:users', // Assuming you want emails to be unique
            'password' => 'required|string|min:6|confirmed',
        ];

        $request->validate($rules);

        // Create a new user with the default role of "Customer"
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_role' => 'Customer', // Set the default role here
            
        ]);

        // Log in the newly registered user
        auth()->login($user);

        // Redirect to the intended page after successful registration
        return redirect()->route('customer.dashboard'); // You can change this to your desired destination
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully'); // Change 'error' to 'success'
    }
}
