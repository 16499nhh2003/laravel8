<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/guest','HomeController@index')->name('guest.index');
Route::get('/guest/shop','HomeController@shop')->name('guest.shop');

//admin 27/05/03  21:06
Route::group(['prefix'=>'admin','middleware'=>'CheckLogin'],function(){
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
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


Auth::routes();
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login')->middleware('CheckLogout'); 
Route::post('/register','Auth\RegisterController@register')->name('registerPost');
