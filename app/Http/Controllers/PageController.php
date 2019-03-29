<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
      $slide = Slide::all();
      $new_product = Product::Where('new',1)->get();
      $new_product_type = ProductType::all();
    	return view('page.home',compact('slide','new_product','new_product_type'));
    }
      public function getShop(){
      $product = Product::paginate(15);
      $product_type = ProductType::all();
    	return view('page.shop',compact('product','product_type'));
    }
    public function getAbout(){
    	return view('page.about');
    }
      public function getProductdetails(){
    	return view('page.productdetails');
    }
      public function getCart(){
    	return view('page.cart');
    }
         public function getContact(){
    	return view('page.contact');
    }
          public function getBlog(){
    	return view('page.blog');
    }
          public function getBlogdetails(){
    	return view('page.blogdetails');
    }
}

