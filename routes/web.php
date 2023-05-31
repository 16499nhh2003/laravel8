<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/test', function () {
//     $mang = ['A','B','C'];
//     $name = "Nguyễn Huy Hòa"; 
//     return view('about',compact('mang','name'));
// });

// route test pagnigation  24/05/2023 19:14
// Route::get('/testPagnigation','CategoryController@index');

// test component  26/05/2023 12:24 
// Route::get('/www',function(){
//     return view('shop');
// });

// test component alert 25/5/2023 21:37
// Route::get('/testAlert',function(){
//     return view('components.alert');
// });


// Route::get('/ogani',function(){
//     return view('layouts.site');
// });

//27/05/2023
Route::get('/','HomeController@index')->name('home.index');
Route::get('/shop','HomeController@shop')->name('home.shop');
//admin 27/05/03  21:06
Route::group(['prefix'=>'admin'],function(){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/test','AdminController@file')->name('admin.file');
    Route::resources([
        'category' => 'CategoryController', 
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
    ]);
    Route::fallback('AdminController@error');
}); 