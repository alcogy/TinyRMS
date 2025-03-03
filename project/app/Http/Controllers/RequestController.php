<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function list() {
        return view('request/list');
    }

    public function detail(string $id) {
        return view('request/detail', ['id' => $id]);
    }

    public function register() {
        return view('request/register');
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
