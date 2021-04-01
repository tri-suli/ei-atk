<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
