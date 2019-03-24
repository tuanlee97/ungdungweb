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
    return view('welcome');
});
Route::get('index',
    [
        'as'=>'home',
        'uses'=>'PageController@getIndex'
    ]
);
Route::get('shop',
    [
        'as'=>'shop',
        'uses'=>'PageController@getShop'
    ]
);
Route::get('about',
    [
        'as'=>'about',
        'uses'=>'PageController@getAbout'
    ]
);
Route::get('blog',
    [
        'as'=>'blog',
        'uses'=>'PageController@getBlog'
    ]
);
Route::get('blog-details',
    [
        'as'=>'blogdetails',
        'uses'=>'PageController@getBlogdetails'
    ]
);
Route::get('cart',
    [
        'as'=>'cart',
        'uses'=>'PageController@getCart'
    ]
);
Route::get('product-details',
    [
        'as'=>'productdetails',
        'uses'=>'PageController@getProductdetails'
    ]
);
Route::get('contact',
    [
        'as'=>'contact',
        'uses'=>'PageController@getContact'
    ]
);

Route::get('admin/dangnhap','UserController@getloginAdmin');
Route::post('admin/dangnhap','UserController@postloginAdmin');

Route::get('admin/dangxuat','UserController@getlogoutAdmin');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'typeproducts'],function(){
        //admin/typeproducts/
        Route::get('danhsach','TypeProductsController@getDanhSach');

        Route::get('them','TypeProductsController@getThem');

        Route::get('sua/{id}','TypeProductsController@getSua');

        Route::post('them','TypeProductsController@XuLyThem');

        Route::post('sua/{id}','TypeProductsController@XuLySua');

        Route::get('xoa/{id}','TypeProductsController@XuLyXoa');
    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');
    });
});
