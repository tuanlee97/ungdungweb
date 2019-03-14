<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
      $slide = Slide::all();
    	return view('page.home');
    }
      public function getShop(){
    	return view('page.shop');
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
