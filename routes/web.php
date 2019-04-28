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



Route::get('/', 'HomeController@index');

Route::get('/gallery/{page}', 'GalleryController@index');

Route::get('/item/{page}/{pagex}/{item}', 'GalleryController@item');

Route::get('/information/{page}', 'InfoController@page');

Route::get('/login', 'InfoController@login');

Route::get('/new_gallery_content', 'AdminController@new_gallery_content');

Route::post('/upload_test', 'AdminController@upload_test');

Route::post('/create_gallery_item', 'GalleryController@create_gallery_item');

Route::post('/create_info_item', 'InfoController@create_info_item');

Route::post('/update_info_item', 'InfoController@update_info_item');

Route::post('/fetch_info_background_image', 'InfoController@fetch_info_background_image');

Route::post('/save_gallery_item_image', 'GalleryController@save_gallery_item_image');

Route::post('/save_gallery_full_images', 'GalleryController@save_gallery_full_images');

Route::post('/save_gallery_item_thumbnail', 'GalleryController@save_gallery_item_thumbnail');

Route::post('/image_delete', 'GalleryController@image_delete');

Route::post('/fetch_first_item_image', 'GalleryController@fetch_first_item_image');

Route::get('/page_management', 'AdminController@page_management');

Route::get('/edit_info_item/{id}', 'AdminController@edit_info_item');

Route::get('/edit_gallery_item/{id}', 'AdminController@edit_gallery_item');

Route::post('/pages_report_data', 'PageController@pages_report_data');

Route::post('/gallery_report_data', 'PageController@gallery_report_data');

Route::post('/update_page_data', 'PageController@update_page_data');

Route::post('/new_page', 'PageController@new_page');

Route::post('/update_page_chk_blk', 'PageController@update_page_chk_blk');

Route::post('/fetch_edit_page_data', 'PageController@fetch_edit_page_data');

Route::post('/delete_page', 'PageController@delete_page');

Route::get('/items_reports', 'AdminController@items_reports');

Route::get('/new_information_page', 'AdminController@new_information_page');

Route::get('/image_management/{id}', 'AdminController@image_management');

Route::get('/thumbnail_management/{id}', 'AdminController@thumbnail_management');










