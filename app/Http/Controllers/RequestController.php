<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Models\User;

class RequestController extends Controller
{
    //
    public function list()
    {
        $requests = Req::with(['applicant', 'approver'])->get();
        return view('home', ['requests' => $requests]);
    }

    public function detail(string $id)
    {
        $request = Req::with(['applicant', 'approver'])->where('id', '=', $id)->first();
        return view('detail', ['request' => $request]);
    }

    public function form()
    {
        $users = User::all();
        return view('form', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $req = new Req();
        $req->title = $request->title;
        $req->body = $request->body;
        $req->applicant_id = 1;
        $req->approver_id = $request->approver_id;
        $req->is_completed = false;
        $req->save();
        
        return redirect('/');
    }

    public function update(Request $request)
    {
        return redirect('/');
    }

    public function delete()
    {
        return redirect('/');
    }
}
