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
Route::get('product-type/{type}',
    [
        'as'=>'producttype',
        'uses'=>'PageController@getProducttype'
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

Route::get('blog-details/{id}',
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
Route::get('updatecart',
    [
        'as'=>'updatecart',
        'uses'=>'PageController@getupdateCart'
    ]
);
Route::get('reducecart/{id}',
    [
        'as'=>'reducecart',
        'uses'=>'PageController@getreduceCart'
    ]
);
Route::get('delete-cart/{id}',
    [
        'as'=>'deletecart',
        'uses'=>'PageController@getDelCart'
    ]
);
Route::get('add-to-cart/{id}',
    [
        'as'=>'addcart',
        'uses'=>'PageController@getaddtoCart'
    ]
);
Route::get('add-to-cart2/{id}',
    [
        'as'=>'addcart2',
        'uses'=>'PageController@getaddtoCart2'
    ]
);
Route::get('checkout',
    [
        'as'=>'checkout',
        'uses'=>'PageController@getcheckOut'
    ]
)->middleware('userLogin');
Route::post('savecheckout',
    [
        'as'=>'savecheckout',
        'uses'=>'PageController@postcheckOut'
    ]
)->middleware('userLogin');
Route::get('product-details/{id}',
    [
        'as'=>'productdetails',
        'uses'=>'PageController@getProductdetails'
    ]
);
Route::get('search',
[
    'as'=> 'search',
    'uses'=> 'PageController@getSearch'
]
);
Route::get('contact',
    [
        'as'=>'contact',
        'uses'=>'PageController@getContact'
    ]
);
Route::get('dangky',
    [
        'as'=>'dangky',
        'uses'=>'CustomerController@getRegister'
    ]
);
Route::post('dangky',
    [
        'as'=>'dangky',
        'uses'=>'CustomerController@postRegister'
    ]
);
Route::get('dangnhap',
    [
        'as'=>'dangnhap',
        'uses'=>'CustomerController@getlogin'
    ]
);
Route::post('dangnhap',
    [
        'as'=>'dangnhap',
        'uses'=>'CustomerController@postlogin'
    ]
);
Route::get('taikhoan',
    [
        'as'=>'taikhoan',
        'uses'=>'CustomerController@gettaikhoan'
    ]
);
Route::get('donhang/{id}',
    [
        'as'=>'donhang',
        'uses'=>'BillController@getdonhang'
    ]
);
Route::get('dangxuat','CustomerController@getdangxuat');


Route::get('admin/dangxuat','UserController@getlogoutAdmin');

    Route::group(['prefix'=>'admin'],function(){
        Route::get('dangnhap','UserController@getloginAdmin');
        Route::post('dangnhap','UserController@postloginAdmin');
    });

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
    Route::group(['prefix'=>'bills'],function(){
        Route::get('danhsach','BillController@getDanhSach');

        Route::get('sua/{id}','BillController@getSua');
        Route::post('sua/{id}','BillController@postSua');

        Route::get('xoa/{id}','BillController@delBill');
        Route::get('search','BillController@getSearch');
    });
    Route::group(['prefix'=>'billdetail'], function(){
        Route::get('danhsach','BillDetailController@getDanhSach');
        //Route::get('chitiet','BillDetailController@getDanhSach');
        Route::get('billdetail_idbill/{id1}','BillDetailController@getDetail');
    });

    Route::group(['prefix'=>'products'],function(){
        Route::get('ds','productsController@getds');
        
        Route::get('add','productsController@getadd');
        Route::get('change/{id}','productsController@getchange');
        Route::post('add','productsController@xulyadd');
        Route::post('change/{id}','productsController@xylychange');
        Route::get('del/{id}','productsController@xulydel');
    });
Route::group(['prefix'=>'customer'],function(){
        //admin/typeproducts/
        Route::get('danhsach','CustomerController@getCustomer');

               Route::get('sua/{id}','CustomerController@getSua');

        

        Route::post('sua/{id}','CustomerController@XuLySua');

        Route::get('xoa/{id}','CustomerController@XuLyXoa');
    });

    
});
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
