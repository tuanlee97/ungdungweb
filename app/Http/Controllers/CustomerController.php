<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Customer;
class CustomerController extends Controller
{
  public function getCustomer(){
    $customer = Customer::paginate(5);
    return view('admin.customer.danhsach',['customer'=>$customer]);
  }
  public function getRegister(){
    return view('page.dangky');   
  }
  public function postRegister(Request $request){
   $this->validate($request,
     [
       'fullname' => 'required|min:3',
       'email'=>'required|email|unique:customer,email',
       'password'=>'required|min:3|max:32',
       'passwordagain'=>'required|same:password',
       'phone'=>'required|min:9|max:10',
     ],
     [
       'name.required'=>'Bạn chưa nhập tên',
       'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
       'email.required'=>'Bạn chưa nhập email',
       'email.unique'=>'Email đã tồn tại',
       'password.required'=>'Bạn chưa nhập mật khẩu',
       'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
       'password.max'=>'Mật khẩu phải chỉ tối đa 32 kí tự',
       'passwordagain.same'=>'Mật khẩu không trùng khớp',
       'phone.min'=>'Số điện thoại không hợp lệ',
       'phone.max'=>'Số điện thoại không hợp lệ',
     ]);

   $customer = new Customer;
   $customer->name = $request->fullname;
   $customer->gender = $request->gender;
   $customer->email = $request->email;
   $customer->password = bcrypt($request->password);
   $customer->address = $request->address;
   $customer->phone_number = $request->phone;


   $customer->save();

   return redirect('index')->with('thongbao','Đăng ký thành công');
 }

 public function getlogin(){
  return view('page.dangnhap');
}
public function getdangxuat(){
  Auth::guard('customer')->logout();
  return redirect('index');
}
public function gettaikhoan(){
  return view('page.taikhoan');
}
public function postCapnhat(Request $request, $id){

  $this->validate($request,
    [
      'fullname' => 'required|min:3',
      'phone'=>'bail|required|digits:10',
      'address'=>'bail|required|string|min:5|max:100',
    ],
    [
      'fullname.required'=>'Vui lòng nhập họ tên',
      'fullname.min'=>'Tên phải có ít nhất 3 kí tự',
      'phone.digits'=>'Số điện thoại phải đủ 10',
      'address.required'=>'Vui lòng nhập địa chỉ',
      'address.string'=>'Địa chỉ không hợp lệ',
      'address.min'=>'Địa chỉ quá ngắn',
      'address.max'=>'Địa chỉ quá dài',
    ]);
  $customer = Customer::find($id);
  $customer->name = $request->fullname;
  $customer->gender=$request->gender;
  $customer->address = $request->address;
  $customer->phone_number = $request->phone;
  if($request->changepassword =="on")
  {
    $pass=$request->oldpassword;
    $this->validate($request,
      [
        'password'=>'required|min:8|max:32',
        'passwordagain'=>'bail|required|same:password',
      ],
      [
        'password.required'=>'Bạn chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu phải có ít nhất 8 kí tự',
        'password.max'=>'Mật khẩu phải chứ tối đa 32 kí tự',
        'passwordagain.required'=>'Chưa nhập lại mật khẩu mới',
        'passwordagain.same'=>'Nhập lại mật khẩu chưa đúng',
      ]);
    
    if(Hash::check($pass,$customer->password))
    {

      $customer->password=bcrypt($request->password);
      $customer->save();
      return redirect()->back()->with('thongbao','Cập nhật thành công');
    }
    else
    {
      return redirect()->back()->with('thongbao','Nhập lại mật khẩu không đúng');
    }
  }
  $customer->save();
  return redirect()->back()->with('thongbao','Cập nhật thành công');
}
public function postlogin(Request $request)
{
  $this->validate($request,
    [
      'email'=>'required',
      'password'=>'required|min:3|max:32',
    ],

    [
      'email.required'=>'Bạn chưa nhập Email',
      'password.required'=>'Bạn chưa nhập mật khẩu',
      'password.min'=>'Mật khẩu không được nhỏ hơn 3 kí tự',
      'password.max'=>'Mật khẩu không được lớn hơn 32 kí tự'

    ]);
  $login=['email'=>$request->email,'password'=>$request->password];
  if(Auth::guard('customer')->attempt($login))
  {
    return redirect('index')->with('thongbao','Đăng nhập thành công');
  }
  else
  {
    return redirect('dangnhap')->with('thongbao','Đăng nhập thất bại');
  }
}
public function getSua($id)
{
  $customer = Customer::find($id);
  return view('admin.customer.sua',['customer'=>$customer]);
}
public function XuLySua(Request $request,$id)
{
 $customer = Customer::find($id);
 $this->validate($request,
   [
    'email'=>'required',
  ],

  [
    'email.required'=>'Bạn chưa nhập Email',


  ]);
 $customer->name = $request->name;
 $customer->gender = $request->gender;
 $customer->email = $request->email;
 $customer->phone_number = $request->phone_number;
 $customer->address = $request->address;
 if($request->changepassword == "on")
 {
  $this->validate($request,
    [
      'password'=>'required|min:3|max:32',
      'passwordagain'=>'required|same:password',
    ],
    [
      'password.required'=>'Bạn chưa nhập mật khẩu',
      'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
      'password.max'=>'Mật khẩu phải chứ tối đa 32 kí tự',
      'passwordagain.same'=>'Mật khẩu không trùng khớp',
    ]);
  $customer->password = bcrypt($request->password);

}

$customer->save();
return redirect('admin/customer/sua/'.$id)->with('thongbao','Cập nhật thành công');


}


//
public function XuLyXoa($id)
{
  $customer = Customer::find($id);
  $customer->delete();
  return redirect('admin/customer/danhsach')->with('thongbao','Xóa thành công');
}





}
