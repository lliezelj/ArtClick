<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the authenticated method to redirect users based on role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if the authenticated user has the role of 'admin' or 'customer'
        if ($user->role === 'admin') {
            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'customer') {
            // Redirect to the homepage
            return redirect()->route('homepage');
        }

        // Default redirect if no role matches
        return redirect('/');
    }
    public function adminLogin(Request $request)
    {
        // Validate admin login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in with provided credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the authenticated user is an admin
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Log out if not an admin
            Auth::logout();

            return redirect()->route('am.signin')->withErrors([
                'email' => 'Access denied. Admins account only.',
            ]);
        }

        // If authentication fails
        return redirect()->route('am.signin')->withErrors([
               'email' => 'Invalid credentials.',
        ]);
    }
}
