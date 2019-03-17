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
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'typeproducts'],function(){
        //admin/typeproducts/
        Route::get('danhsach','TypeProductsController@getDanhSach');

        Route::get('them','TypeProductsController@getThem');

        Route::get('sua/{id}','TypeProductsController@getSua');

        Route::post('them','TypeProductsController@XuLyThem');

        Route::post('sua/{id}','TypeProductsController@XuLySua');

        Route::get('xoa/{id}','TypeProductsController@XuLyXoa');
    });
});
