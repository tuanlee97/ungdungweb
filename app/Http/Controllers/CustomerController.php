<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Customer;

class CustomerController extends Controller
{
    public function getCustomer(){
      $customer = Customer::paginate(5);
      return view('admin.customer.danhsach',['customer'=>$customer]);
  }
  public function getRegister(){
      return view('page.register');   
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
    return view('page.login');
}
// public function postlogin(Request $request)
// {
//     $this->validate($request,
//         [
//             'email'=>'required',
//             'password'=>'required|min:3|max:32',
//         ],

//         [
//             'email.required'=>'Bạn chưa nhập Email',
//             'password.required'=>'Bạn chưa nhập mật khẩu',
//             'password.min'=>'Mật khẩu không được nhỏ hơn 3 kí tự',
//             'password.max'=>'Mật khẩu không được lớn hơn 32 kí tự'

//         ]);
//     $login=['email'=>$request->email,'password'=>$request->password];
//     if(Auth::attempt($login))
//     {
//         // echo ($request->email);
//         // echo "<br>";
//         // echo ($request->password);
//         return redirect()->intended('index');
//     }



//     else
//     {
//         return redirect('login')->with('thongbao','Đăng nhập thất bại');

//     }
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

    if(Auth::attempt($login))
    // echo ($request->email);
    // echo "<br>";
    // echo ($request->password);
    // exit();
    {

        return redirect('index');
            //return redirect()->intended('admin/tintuc/danhsach');
    }
    else
    {
        return redirect('login')->with('thongbao','Đăng nhập thất bại');
    }
}


}
