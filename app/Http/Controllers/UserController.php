<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Models\User;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user == null) return redirect('/signin?error=notfound');

        $request->session()->put('user', $user);
        return redirect('/');
    }

    public function signout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/signin');
    }
}
