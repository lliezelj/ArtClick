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
}
