<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Images;
use App\Pages;
use App\Users;
use Hash;
use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function login()
    {
        return view('login')->with('current_page','')->with(['menu'=>Pages::where('top_link',1)->orderBy('page_order')->get()]);
    }

    public function login_fnc(Request $request){

        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }else {

            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            if (Auth::attempt($userdata)) {

                return Redirect::to('items_reports');
                $request->session()->put('email', Input::get('email'));
        
            } else {        
                //echo 'FAIL!';
                // validation not successful, send back to form 
                $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
                return Redirect::to('login')->withErrors($errors);
        
            }
        }

    }

    public function logout(Request $request){
        $request->session()->flush();
        return Redirect::to('login');
    }
    
}
