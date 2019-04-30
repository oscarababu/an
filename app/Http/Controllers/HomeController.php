<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Images;
use App\Pages;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $menu = Pages::where('top_link',1)->orderBy('page_order')->get();
        $links = Pages::where('home_link',1)->orderBy('page_order')->get();
        return view('index')->with(['menu'=>$menu])->with(['current_page'=>''])->with(['links'=>$links]);
    }

    public function gen_images()
    {
        $res = Images::where('type','full_image')->where('background','1')->get();
        $arr = array();
        foreach($res as $val){
            $arr[] = $val->id;
        }
        $arr_count = count($arr);
        $rand_fig = rand(0,($arr_count - 1));
        
        $back_img = Images::where('id',$arr[$rand_fig])->first();
        
        return array('background'=>$back_img->image_link,'image_id'=>$arr[$rand_fig]);
    }

    
}
