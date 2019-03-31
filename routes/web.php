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
<<<<<<< HEAD
Route::get('blog-details',
=======

Route::get('blog-details/{id}',
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
[
    'as'=>'blogdetails',
    'uses'=>'PageController@getBlogdetails'
]
<<<<<<< HEAD
);
Route::get('cart',
=======
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
Route::get('delete-cart/{id}',
    [
        'as'=>'deletecart',
        'uses'=>'PageController@getDelCart'
    ]
);
Route::get('add-to-cart/{id}',
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
[
    'as'=>'cart',
    'uses'=>'PageController@getCart'
]
);
<<<<<<< HEAD
Route::get('product-details',
=======
Route::get('checkout',
    [
        'as'=>'checkout',
        'uses'=>'PageController@getcheckOut'
    ]
);
Route::post('savecheckout',
    [
        'as'=>'savecheckout',
        'uses'=>'PageController@postcheckOut'
    ]
);
Route::get('product-details/{id}',
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
[
    'as'=>'productdetails',
    'uses'=>'PageController@getProductdetails'
]
<<<<<<< HEAD
=======
);
Route::get('product-details',
    [
        'as'=>'productdetails',
        'uses'=>'PageController@getProductdetails'
    ]

>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
);
Route::get('contact',
[
    'as'=>'contact',
    'uses'=>'PageController@getContact'
]
);
<<<<<<< HEAD
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'product'],function(){
        Route::get('ds','productController@getds');
        Route::get('add','productController@getadd');
        Route::get('change/{id}','productController@getchange');
        Route::post('add','productController@xulyadd');
        Route::post('change/{id}','productController@xylychange');
        Route::get('del/{id}','productController@xulydel');
=======
Route::get('register',
    [
        'as'=>'register',
        'uses'=>'CustomerController@getRegister'
    ]
);
Route::post('register',
    [
        'as'=>'register',
        'uses'=>'CustomerController@postRegister'
    ]
);
Route::get('login',
    [
        'as'=>'login',
        'uses'=>'CustomerController@getlogin'
    ]
);
Route::post('login',
    [
        'as'=>'login',
        'uses'=>'CustomerController@postlogin'
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
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
    });
    Route::group(['prefix'=>'bills'],function(){
        Route::get('danhsach','BillController@getDanhSach');

        Route::get('sua/{id}','BillController@getSua');
        Route::post('sua/{id}','BillController@postSua');

        Route::get('xoa/{id}','BillController@delBill');
    });
    Route::group(['prefix'=>'billdetail'], function(){
        Route::get('danhsach','BillDetailController@getDanhSach');
        //Route::get('chitiet','BillDetailController@getDanhSach');
        Route::get('billdetail_idbill','BillDetailController@getDetail');
    });
    Route::group(['prefix'=>'customer'],function(){
        Route::get('danhsach','CustomerController@getCustomer');
    });
});

