<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\TinTuc;
use App\Cart;
use Illuminate\Http\Request;
use Session;
class PageController extends Controller
{
    public function getIndex(){
      $slide = Slide::all();
      $new_product = Product::Where('new',1)->get();
      $new_product_type = ProductType::all();
    	return view('page.home',compact('slide','new_product','new_product_type'));
    }
    public function getProducttype($type){
      $namept = ProductType::Where('id',$type)->get('name');
      $product_type = ProductType::all();
      $sp_theoloai = Product::Where('id_type',$type)->paginate(15);
      return view('page.product_type',compact('sp_theoloai','product_type','namept'));
    }
      public function getShop(){
      $product = Product::paginate(15);
      $product_type = ProductType::all();
    	return view('page.shop',compact('product','product_type'));
    }
    public function getAbout(){
    	return view('page.about');
    }
      public function getProductdetails(Request $req){
        $sanpham = Product::Where('id',$req->id)->first();
        $namept = ProductType::Where('id',$req->id)->get('name');
    	return view('page.productdetails',compact('sanpham','namept'));
    }
      public function getCart(){
    	return view('page.cart');
    }
     public function getaddtoCart(Request $req,$id){
      $product = Product::find($id);
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($product,$id);
      $req->session()->put('cart',$cart);
      return redirect()->back();
    }
         public function getContact(){
    	return view('page.contact');
    }
          public function getBlog(){
            $blog = TinTuc::paginate(9);
    	return view('page.blog',compact('blog'));
    }
          public function getBlogdetails(Request $req){
             $blog = TinTuc::Where('id',$req->id)->first();
               $otherblog = TinTuc::Where('id','<>',$req->id)->paginate(3);
    	return view('page.blogdetails',compact('blog','otherblog'));
    }
}

