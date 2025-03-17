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
        $req = Req::with(['applicant', 'approver'])->where('approver_id', '=', $user->id)->orWhere('applicant_id', '=', $user->id)->get();
        return view('home', ['requests' => $req, 'user' => $user]);
    }

    public function detail(Request $request, string $id)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $request = Req::with(['applicant', 'approver'])->where('id', '=', $id)->first();
        return view('detail', ['request' => $request, 'user' => $user]);
    }

    public function form(Request $request, string $id = null)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $users = User::all();

        $req = null;
        if ($id != null)
        {
            $req = Req::where('id', $id)->first();
        }

        return view('form', ['users' => $users, 'user' => $user, 'req' => $req]);
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
        
        $req = Req::where('id', '=', $request->id)->first();
        $req->title = $request->title;
        $req->body = $request->body;
        $req->approver_id = $request->approver_id;
        $req->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');
        $req = Req::where('id', '=', $request->id)->first();
        $req->delete();
        
        return redirect('/');
    }

    public function approval(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user == null) return redirect('/signin');

        $req = Req::where('id', '=', $request->id)->first();
        $req->is_completed = true;
        $req->save();
        return redirect('/');
    }
}
