<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function page()
    {
        return view('info');
    }

    public function login()
    {
        return view('login');
    }
}
