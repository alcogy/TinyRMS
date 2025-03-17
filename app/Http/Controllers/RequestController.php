<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Models\User;

class RequestController extends Controller
{
    //
    public function list(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $req = Req::with(['applicant', 'approver'])->get();
        return view('home', ['requests' => $req, 'user' => $user]);
    }

    public function detail(Request $request, string $id)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $request = Req::with(['applicant', 'approver'])->where('id', '=', $id)->first();
        return view('detail', ['request' => $request, 'user' => $user]);
    }

    public function form(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $users = User::all();
        return view('form', ['users' => $users, 'user' => $user]);
    }

    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');

        $req = new Req();
        $req->title = $request->title;
        $req->body = $request->body;
        $req->applicant_id = $user->id;
        $req->approver_id = $request->approver_id;
        $req->is_completed = false;
        $req->save();
        
        return redirect('/');
    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        return redirect('/');
    }

    public function delete()
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        return redirect('/');
    }
}
