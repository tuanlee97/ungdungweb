<?php
namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\TinTuc;
use App\Cart;
use App\Bill;
use App\BillDetail;
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
    public function getSearch(Request $req){
      $product_type = ProductType::all();
      $product = Product::Where('name','like','%'.$req->key.'%')->get();
        return view('page.search',compact('product','product_type'));
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
    public function getTest()
    {

      return view('page.test');
    }

}

