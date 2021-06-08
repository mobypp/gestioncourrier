<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('app.user.index');
    }

    public function create()
    {
        return view('app.user.create');
    }
}
