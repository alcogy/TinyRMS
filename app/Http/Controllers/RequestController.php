<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Req;

class RequestController extends Controller
{
    //
    public function list() {
        $requests = Req::with(['applicant', 'approver'])->get();
        return view('home', ['requests' => $requests]);
    }

    public function detail(string $id) {
        $request = Req::with(['applicant', 'approver'])->where('id', '=', $id)->first();
        return view('detail', ['request' => $request]);
    }

    public function form() {
        return view('form');
    }

    public function create(Request $request) {
        return "hello: " . $request->name;
    }

    public function update(Request $request) {
        return "";
    }

    public function delete() {
        return "";
    }
}
