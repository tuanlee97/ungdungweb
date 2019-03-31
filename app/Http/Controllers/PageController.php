<?php
namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
<<<<<<< HEAD
=======
use App\TinTuc;
use App\Cart;
use App\Bill;
use App\BillDetail;
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
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
<<<<<<< HEAD
         public function getContact(){
=======
     public function getaddtoCart(Request $req,$id){
      $product = Product::find($id);
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($product,$id);
      $req->session()->put('cart',$cart);
      return redirect()->back();
    }
    public function getDelCart ($id)
    {
      $oldCart =Session::has('cart')?Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->removeItem($id);
      Session::put('cart',$cart);
      return redirect()->back();
    }
      public function getcheckOut(){
        return view('page.checkout');
    }
    public function postcheckOut(Request $request){
      $cart=Session::get('cart');
        $bill=new Bill;
        $bill->id_customer = '21';
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        //$bill->payment = $req->totalPrice;
        //$bill->note = $req->totalPrice;
        $bill->save();
        foreach ($cart->items as $key => $value) {
          $bill_detail= new BillDetail;
          $bill_detail->id_bill=$bill->id;
          $bill_detail->id_product=$key;
          $bill_detail->quantity=$value['qty'];
          $bill_detail->unit_price=$value['price']/$value['qty'];
          $bill_detail->save();
        }
        Session::forget('cart');
        return redirect('cart');
    }
    public function getContact(){
>>>>>>> 2e37d6967574d35741ecb1ea394472e03aaca198
    	return view('page.contact');
    }
          public function getBlog(){
    	return view('page.blog');
    }
          public function getBlogdetails(){
    	return view('page.blogdetails');
    }
    public function getTest()
    {

      return view('page.test');
    }
}

