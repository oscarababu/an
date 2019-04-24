<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Gallery;
use App\Images;


class GalleryController extends Controller
{
    public function index()
    {
        $res = DB::table('gallery')->join('images','gallery.id','=','images.cont_id')->where('images.type','thumbnail')->get();
        return view('gallery')->with(['items'=>$res]);
    }

    public function item($page,$item)
    {
        $res_gallery = Gallery::where('page_link',$item)->get();

        return view('item')->with(['gallery'=>$res_gallery]);
    }

    public function create_gallery_item(Request $request){
            
            $first_page = ($request->firstPage) ? $request->firstPage: 0;
            $second_page = ($request->secondPage) ? $request->secondPage : 0;
            $third_page = ($request->thridPage) ? $request->thridPage : 0;
            $page_link = str_replace(" ","_",strtolower($request->title));
            $chk = Gallery::select('id')->where('page_link',$page_link)->get();

            if($chk->count() == 0){
                $g = new Gallery();
                $g->title = $request->title;
                $g->page_link = $page_link;
                $g->description = $request->desc;
                $g->status = 0;
                $g->page = $first_page . "_" . $second_page . "_". $third_page;
                $g->save();
                $item_id = Gallery::select('id')->orderBy('id','desc')->first();
                return array('item_id'=>$item_id->id);
            }else{
                return array('status'=>0);
            }       
    }

    public function save_gallery_item_image(Request $request){
        
        $img = new Images();
        $img->image_link = $request->up_image;
        $img->format = $request->up_image_format;
        $img->cont_id = $request->item_id;
        $img->type = $request->type;
        $img->public_id = $request->up_image_public_id;
        $img->save();

        return array('status'=>1);
    }

    public function fetch_first_item_image(Request $request){

        $id = $request->id;

        $res = Images::where('cont_id',$id)->get();

        foreach($res as $i=>$val){
            $d[$i]['image'] = $val->image_link;
        }

        return $d;

    }

}