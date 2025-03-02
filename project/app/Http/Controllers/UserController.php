<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function list() {
        return view('user/list');
    }

    public function detail(string $id) {
        return view('user/detail', ['id' => $id]);
    }

    public function register() {
        return view('user/register');
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
