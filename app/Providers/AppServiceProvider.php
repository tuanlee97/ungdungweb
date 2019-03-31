<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('header',function($view){
            $loai_sp= ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });
<<<<<<< HEAD
    }
=======
         view()->composer('*',function($view){
               if(Session ('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
         });
         // view()->composer('page.cart',function($view){
         //       if(Session ('cart')){
         //        $oldCart = Session::get('cart');
         //        $cart = new Cart($oldCart);
         //        $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
         //    }
         // });
         // view()->composer('page.checkout',function($view){
         //       if(Session ('cart')){
         //        $oldCart = Session::get('cart');
         //        $cart = new Cart($oldCart);
         //        $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
         //    }
         // });
    
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
}
