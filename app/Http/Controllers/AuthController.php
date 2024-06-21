<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        // Redirect authenticated users to the dashboard
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
    
        // For non-authenticated users, show the login view
        $message = '';
        return view('auth.login', compact('message'));
    }
    
    


    public function loginPost(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    function register()
    {
        // Redirect authenticated users to the dashboard
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
    
        // For non-authenticated users, show the login view
        $message = '';
        return view('auth.register', compact('message'));
    }
    public function registerPost(Request $request)
    {
        // Validate the login request
        $request->validate([
            'name' => 'required' ,
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()){
            return \redirect(route('app'))->with("succes","User Created succesfully");
        
        }
        return redirect("register")->with("error", "Failed to sign up");

        // Attempt to log in the user
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the dashboard
            return redirect()->route('app');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials.']);
        }
    }
}
