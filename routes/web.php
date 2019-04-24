<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/gallery', 'GalleryController@index');

Route::get('/item/{page}/{item}', 'GalleryController@item');

Route::get('/info', 'InfoController@page');

Route::get('/login', 'InfoController@login');

Route::get('/new_gallery_content', 'AdminController@new_gallery_content');

Route::post('/upload_test', 'AdminController@upload_test');

Route::post('/create_gallery_item', 'GalleryController@create_gallery_item');

Route::post('/save_gallery_item_image', 'GalleryController@save_gallery_item_image');

Route::post('/fetch_first_item_image', 'GalleryController@fetch_first_item_image');

Route::get('/page_management', 'AdminController@page_management');

Route::post('/pages_report_data', 'PageController@pages_report_data');

Route::post('/gallery_report_data', 'PageController@gallery_report_data');

Route::post('/update_page_data', 'PageController@update_page_data');

Route::post('/new_page', 'PageController@new_page');

Route::post('/update_page_chk_blk', 'PageController@update_page_chk_blk');
















Route::get('/image_management/{id}', 'AdminController@image_management');







