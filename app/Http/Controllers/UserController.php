<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
class UserController extends Controller
{
    public function getDanhSach(){
		$user = User::all();
    	 return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getSua($id){
    		$user = User::find($id);
    		return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
    	$this->validate($request,
    	[
    			'fullname' => 'required|min:3',
    			'phone'=>'required|min:9|max:11',
    	],
    	[
    			'name.required'=>'Bạn chưa nhập tên người dùng',
    			'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
    			'phone.min'=>'Số điện thoại không hợp lệ',
    			'phone.max'=>'Số điện thoại không hợp lệ',
    	]);

    	$user = User::find($id);
    	$user->full_name = $request->fullname;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
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
    		$user->password = bcrypt($request->password);

    	}

    	$user->save();
    	return redirect('admin/user/sua/'.$id)->with('thongbao','Cập nhật thành công');


    }


    public function getThem(){
    	return view('admin.user.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    	[
    			'fullname' => 'required|min:3',
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required|min:3|max:32',
    			'passwordagain'=>'required|same:password',
    			'phone'=>'required|min:9|max:11',
    	],
    	[
    			'name.required'=>'Bạn chưa nhập tên người dùng',
    			'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.unique'=>'Email của bạn đã tồn tại',
    			'password.required'=>'Bạn chưa nhập mật khẩu',
    			'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
    			'password.max'=>'Mật khẩu phải chứ tối đa 32 kí tự',
    			'passwordagain.same'=>'Mật khẩu không trùng khớp',
    			'phone.min'=>'Số điện thoại không hợp lệ',
    			'phone.max'=>'Số điện thoại không hợp lệ',
    	]);

    	$user = new User;
    	$user->full_name = $request->fullname;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->phone = $request->phone;
    	$user->address = $request->address;

    	$user->save();

    	return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getloginAdmin(){
        return view('admin.login');
    }

    public function postloginAdmin(Request $request)
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
        {

            return redirect('admin/tintuc/danhsach');
            //return redirect()->intended('admin/tintuc/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
        }
    }
    public function getlogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
