<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        session()->flash('message','Your session has been expired!');
        return Redirect('/admin');
    }

    public function login(Request $request)
    {
        return view('frontend.login');
    }

    public function userLogout(){
        \Session::flush();
        return Redirect('/');
    }
}
