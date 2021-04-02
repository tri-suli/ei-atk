<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    /**
     * Show page to the browser's
     *
     * @return void
     */
    public function index()
    {
        return view('pages.login');
    }
    
    /**
     * Read the incoming login request and redirect
     * to home page when credentials is match.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request)
    {
        $credentials = [
            'password' => $request->password,
            filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name' => $request->username,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    /**
     * Logged out user from application
     *
     * @param  Request  $request
     * @return void
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
