<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Images;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function new_gallery_content()
    {
        return view('new_gallery_content');
    }

    public function page_management()
    {
        return view('page_management');
    }

    public function image_management($id)
    {
        $thumb = Images::where('cont_id',$id)->where('type','thumbnail')->get();
        $images = Images::where('cont_id',$id)->where('type','full_image')->orderBy('id','desc')->get();
        return view('new_gallery_images')->with(['items'=>Gallery::find($id)])->with(['thumb'=>$thumb])->with(['images'=>$images]); 
    }

    public function upload_test()
    {
        print_r($_POST);
    }
    
}
