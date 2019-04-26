<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;
use App\Images;
use App\Pages;

class InfoController extends Controller
{
    public function page($page)
    {
        $menu = Pages::where('top_link',1)->orderBy('page_order')->get();
        $links = Pages::where('in_page_link',1)->orderBy('page_order')->get();
        return view('info')->with(['menu'=>$menu])->with(['links'=>$links]);
    }

    public function login()
    {
        return view('login')->with(['menu'=>Pages::where('top_link',1)->orderBy('page_order')->get()]);
    }

    public function create_info_item(Request $request){
        
            $first_page = ($request->firstPage) ? $request->firstPage: 0;
            $second_page = ($request->secondPage) ? $request->secondPage : 0;
            $third_page = ($request->thridPage) ? $request->thridPage : 0;
            $page_link = str_replace(" ","-",strtolower($request->title));
            $chk = Gallery::select('id')->where('page_link',$page_link)->get();

            if($chk->count() == 0){
                $g = new Gallery();
                $g->title = $request->title;
                $g->page_link = $page_link;
                $g->description = $request->desc;
                $g->link = $request->link;
                $g->link_title = $request->link_ttl;
                $g->status = 0;
                $g->page = $first_page . "_" . $second_page . "_". $third_page;
                $g->save();
                $item_id = Gallery::select('id')->orderBy('id','desc')->first();
                return array('item_id'=>$item_id->id);
            }else{
                return array('status'=>0);
            } 
    }


}
