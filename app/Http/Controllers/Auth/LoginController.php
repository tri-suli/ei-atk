<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
        $credentials = ['password' => $request->password];

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
        } else {
            $credentials['name'] = $request->username;
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }
}
