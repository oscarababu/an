<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Images;
use App\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /*
    public function __construct(Request $request)
    {
        if (!$request->session()->exists('users')) {
            return Redirect::to('login');
        }
    }
    */
    
    public function new_gallery_content()
    {
        $pages = Pages::where('type','Gallery')->get();
        return view('new_gallery_content')->with(['pages'=>$pages]);
    }

    public function page_management()
    {
        return view('page_management');
    }

    public function back_management()
    {
        $res = Images::where('type','full_image')->get();
        return view('back_management')->with(['images'=>$res]);
    }

    public function new_information_page()
    {
        $pages = Pages::where('type','Information')->get();
        return view('new_info_content')->with(['pages'=>$pages]);
    }

    public function info_items_reports()
    {
        $items = Gallery::where('type','information')->get();
        
        return view('info_items_reports')->with(['items'=>$items]);
    }

    public function items_reports()
    {

        $items = Gallery::where('type','gallery')->get();
        
        return view('items_reports')->with(['items'=>$items]);
    }

    public function image_management($id)
    {
        $images = Images::where('cont_id',$id)->where('type','full_image')->orderBy('id','desc')->get();
        return view('new_gallery_images')->with(['image_id'=>$id])->with(['items'=>Gallery::find($id)])->with(['images'=>$images]); 
    
    }

    public function thumbnail_management($id)
    {
        $thumb = Images::where('cont_id',$id)->where('type','thumbnail')->get();
        return view('thumbnail_mgt')->with(['items'=>Gallery::find($id)])->with(['thumb'=>$thumb]); 
    }

    public function edit_info_item($id)
    {
        $g = Gallery::find($id);
        return view('edit_item')->with(['items'=>$g]);
    }

    public function edit_gallery_item($id)
    {
        $g = Gallery::find($id);
        return view('edit_gallery_item')->with(['items'=>$g]);
    }

    public function disable_item($id){

        $g = Gallery::find($id);
        $g->status = 0;
        $g->save();

        $items = Gallery::get();
        
        return view('items_reports')->with(['items'=>$items]);
    }

    public function enable_item($id){

        $g = Gallery::find($id);
        $g->status = 1;
        $g->save();

        $items = Gallery::get();
        
        return view('items_reports')->with(['items'=>$items]);

    }

    public function update_back_images(Request $request){
        foreach($request->images_arr as $i=>$val){
            if(!empty($val)){
                $up = Images::find($i);
                $up->background = $val;
                $up->save();
            }
        }
    }

    public function upload_test()
    {
        print_r($_POST);
    }
    
}
