<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Gallery;
use App\Images;
use App\Pages;

class InfoController extends Controller
{
    public function page($page)
    {
        $res_page = Pages::where('page', 'like', '%' . str_replace('-',' ',$page . '%'))->first();
        if($res_page){
            
            $res = DB::table('gallery')->join('images','gallery.id','=','images.cont_id')->where('images.type','full_image')->where('gallery.page', 'like', '%' . $res_page->id . '%')->get();

            $menu = Pages::where('top_link',1)->orderBy('page_order')->get();
            $links = Pages::where('in_page_link',1)->orderBy('page_order')->get();
            
            return view('info')->with(['menu'=>$menu])->with(['links'=>$links])->with(['items'=>$res])->with(['current_page'=>'information'])->with(['page'=>Pages::find($res_page->id)]);

        }else{
            abort(404);
        }
    }

    public function login()
    {
        return view('login')->with(['menu'=>Pages::where('top_link',1)->orderBy('page_order')->get()]);
    }

    public function create_info_item(Request $request){
        
            $first_page = ($request->firstPage) ? $request->firstPage: 0;
            $second_page = ($request->secondPage) ? $request->secondPage : 0;
            $third_page = ($request->thridPage) ? $request->thridPage : 0;
            $page = $first_page . "_" . $second_page . "_". $third_page;
            $chk = Gallery::select('id')->where('page',$page)->get();

            if($chk->count() == 0){
                $g = new Gallery();
                $g->title = $request->title;
                $g->description = $request->desc;
                $g->status = 0;
                $g->page = $page;
                $g->save();
                $item_id = Gallery::select('id')->orderBy('id','desc')->first();
                return array('item_id'=>$item_id->id);
            }else{
                return array('status'=>0);
            } 
    }

    public function update_info_item(Request $request){
        $g = Gallery::find($request->id);
        $g->description = $request->desc;
        $g->save();
    }

    public function fetch_info_background_image(Request $request){
        //echo $request->id;
        $i = Images::find($request->id);

        return array('image_link'=>$i->image_link);
    }


}
