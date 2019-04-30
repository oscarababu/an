<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Gallery;
use App\Images;
use App\Pages;


class GalleryController extends Controller
{
    public function index($page)
    {
        $res_page = Pages::where('page', 'like', '%' . str_replace('-',' ',$page . '%'))->first();
        if($res_page){
            $res = DB::table('gallery')->join('images','gallery.id','=','images.cont_id')->where('images.type','thumbnail')->where('gallery.page', 'like', '%' . $res_page->id . '%')->orderBy('gallery.id','DESC')->get();
            return view('gallery')->with(['pagex'=>$page])->with(['items'=>$res])->with(['menu'=>Pages::where('top_link',1)->orderBy('page_order','ASC')->get()])->with(['current_page'=>$page]);
       
        }else{
            abort(404);
        }
         
    }

    public function item($page,$pagex,$item)
    {
        $res_gallery = Gallery::where('page_link',$item)->get();

        return view('item')->with(['pagex'=>$pagex])->with(['current_page'=>$pagex])->with(['gallery'=>$res_gallery])->with(['menu'=>Pages::where('top_link',1)->get()]);
    }

    public function create_gallery_item(Request $request){
            
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

        $first_page = ($request->firstPage) ? $request->firstPage: 0;
        $second_page = ($request->secondPage) ? $request->secondPage : 0;
        $third_page = ($request->thridPage) ? $request->thridPage : 0;
        $page = $first_page . "_" . $second_page . "_". $third_page;

        $item = Gallery::where('page',$page)->orderBy('id','DESC')->first();
        
        $img = new Images();
        $img->image_link = $request->up_image;
        $img->format = $request->up_image_format;
        $img->cont_id = $item->id;
        $img->type = $request->type;
        $img->public_id = $request->up_image_public_id;
        $img->save();

        $g = Gallery::find($item->id);
        $g->status = 1;
        $g->save();

        return array('status'=>1,'item_id'=>$item->id,'item_title'=>$item->title);
    }

    public function save_gallery_full_images(Request $request){

        $id = $request->item_id;
        
        $img = new Images();
        $img->image_link = $request->up_image;
        $img->format = $request->up_image_format;
        $img->cont_id = $id;
        $img->type = $request->type;
        $img->public_id = $request->up_image_public_id;
        $img->save();

        $g = Gallery::find($id);
        $g->status = 1;
        $g->save();

        return array('status'=>1);

    }

    public function save_gallery_item_thumbnail(Request $request){
        
        $img = Images::find($request->thumb_id);
        $img->image_link = $request->up_image;
        $img->format = $request->up_image_format;
        $img->cont_id = $request->item_id;
        $img->type = $request->type;
        $img->public_id = $request->up_image_public_id;
        $img->save();

        return array('status'=>1);
    }

    public function image_delete(Request $request){

        $item_id = $request->item_id;
        $image_id = $request->image_id;

        $i = Images::find($image_id);
        if($i){

            $public_id = $i->public_id;

            $result = \Cloudinary\Uploader::destroy($public_id, $options = array(
                'api_key'=>'423211761636548',
                'api_secret'=>'CYSYzZo-v53o4breP5kfTVzK1mw',
                'cloud_name'=>'dct1ukpad'
            ));

            $i->delete();
            return array('status'=>1);
        }else{
            return array('status'=>0);
        }
        
    }

    public function fetch_first_item_image(Request $request){

        $id = $request->id;

        $res = Images::where('cont_id',$id)->where('type','full_image')->get();

        foreach($res as $i=>$val){
            $d[$i]['image'] = $val->image_link;
        }

        return $d;

    }

}
