<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Gallery;
use App\Images;
use App\Pages;

class PageController extends Controller
{
    public function pages_report_data(Request $request){
        $pages_gallery = Pages::where('type','Gallery')->orderBy('page_order','ASC')->get();
        $pages_info = Pages::where('type','Information')->orderBy('page_order','ASC')->get();
        
        if($pages_gallery->count() > 0 || $pages_info->count() > 0){
            $data['num_rows_gallery'] = $pages_gallery->count();
            $data['num_rows_info'] = $pages_info->count();
            $data['res_gallery'] = $pages_gallery;
            $data['res_info'] = $pages_info;
            return array($data);
        }else{
            return array('status'=>0);
        }
    }

    public function gallery_report_data(Request $request){
        $res = Gallery::select('title','page','id')->get();

        foreach($res as $i=>$val){
            $d[$i]['title'] = $val->title;
            $d[$i]['page'] = $val->page;
            $d[$i]['id'] = $val->id;

            if(!empty($val->page)){

                $exp_page = explode("_",$val->page);

                $page_one = Pages::select('page','id')->find($exp_page[0]);
                $page_two = Pages::select('page','id')->find($exp_page[1]);
                $page_three = Pages::select('page','id')->find($exp_page[2]);

                if($page_one){
					$one = $page_one->page;
					$one_id = $page_one->id;
				}else{
					$one = "";
					$one_id = 0;
				}

				if($page_two){
					$two = $page_two->page;
					$two_id = $page_two->id;
				}else{
					$two = "";
					$two_id = 0;
				}

				if($page_three){
					$three = $page_three->page;
					$three_id = $page_three->id;
				}else{
					$three = "";
					$three_id = 0;
                }

                $d[$i]['comp_page'] = $one . "|" . $one_id . "_" . $two . "|" . $two_id . "_" . $three . "|" . $three_id;
				$d[$i]['one'] = $one;
				$d[$i]['one_id'] = $one_id;
				$d[$i]['two'] = $two;
				$d[$i]['two_id'] = $two_id;
				$d[$i]['three'] = $three;
				$d[$i]['three_id'] = $three_id;
  
            }
        }

        $f['gallery_items'] = $d;
        
        $res_pages = Pages::select('page','id')->where('type','Gallery')->get();
		
		foreach($res_pages as $j=>$val_pages){
			$e[$j]['page_id'] = $val_pages->id;
			$e[$j]['act_page'] = $val_pages->page;
		}
		$f['pagez'] = $e;
		echo json_encode($f);

    }

    public function update_page_data(Request $request){
            $g = Pages::find($request->id);
            $g->page = $request->page;
            $g->top_link = $request->top_link;
            $g->home_link = $request->home_link;
            $g->in_page_link = $request->in_page_link;
            $g->type = $request->type;
            $g->save();

            return array('status'=>1);
    }

    public function update_page_chk_blk(Request $request){
        $g = Gallery::find($request->id);
        $g->page = $request->page;
        $g->save();

    }

    public function new_page(Request $request){

        $chk = Pages::select('id')->where('page',$request->page)->where('status',1)->get();

        if($chk->count() ==0){
            $res_page_order = Pages::select('id','page_order')->limit(1)->where('type',$request->type)->get();
            if($res_page_order->count() > 0){
                foreach($res_page_order as $val_page_order){
                    $highest_page_order = $val_page_order->page_order;

                    $new_page_order = $highest_page_order + 1;

                }

            }else{
                $new_page_order = 1;
            }

            $p = new Pages();
            $p->page = $request->page;
            $p->type = $request->type;
            $p->top_link = $request->top_link;
            $p->home_link = $request->home_link;
            $p->in_page_link = $request->in_page;
            $p->page_order = $new_page_order;
            $p->save();

            return array('status'=>1);
        }else{
            return array('status'=>1);
        }
    }

    


    
}
