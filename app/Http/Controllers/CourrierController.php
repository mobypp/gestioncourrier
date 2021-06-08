<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourrierController extends Controller
{
    public function index() {
        return view('app.courrier.index');
    }

    public function create()
    {
        return view('create');
    }
}
