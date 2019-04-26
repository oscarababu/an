<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pages;

class HomeController extends Controller
{
    //

    public function index()
    {
        $menu = Pages::where('top_link',1)->orderBy('page_order')->get();
        $links = Pages::where('home_link',1)->orderBy('page_order')->get();
        return view('index')->with(['menu'=>$menu])->with(['links'=>$links]);
    }

    
}
