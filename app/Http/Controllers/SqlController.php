<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SqlController extends Controller
{
    public function index()
    {
        return view('sql.home');
    }
}
