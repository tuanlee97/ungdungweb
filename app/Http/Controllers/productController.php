<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class productController extends Controller
{
    public function getds()
    {
        $product = Product::all();
        return view('admin.product.product',['product'=>$product]);
    }
    public function getadd()
    {
        return view('admin.product.add');
    }

    public function xulyadd(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'name'=>'required|unique:product,name|min:3|max:100'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'name.required'=>'Bạn chưa nhập Tên!',
                'name.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'name.min'=>'Tên phải gồm ít nhất 3 ký tự!',
                'name.max'=>'Tên phải gồm tối đa 100 ký tự!'
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image=str_random(4)."_".$name;
            while (file_exists("source/images/category/".$image)) {
                $image=str_random(4)."_".$name;
            }
            $file->move("source/images/category/",$image);
            $product->image=$image;
        }
        $product->save();
        return redirect('admin/product/add')->with('thongbao','Thêm Thành Công');
    }

    public function getchange($id)
    {
        $product = Product::find($id);
        return view('admin.product.sua',['product'=>$product]);
    }
    public function xulychange(Request $request,$id)
    {
        $product = Product::find($id);
        $this->validate($request,
            [
                'name'=>'required|unique:product,name|min:3|max:100'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'name.required'=>'Bạn chưa nhập Tên!',
                'name.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'name.min'=>'Tên phải gồm ít nhất 3 ký tự!',
                'name.max'=>'Tên phải gồm tối đa 100 ký tự!'
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image=str_random(4)."_".$name;
            while (file_exists("source/images/category/".$image)) {
                $image=str_random(4)."_".$name;
            }
            $file->move("source/images/category/",$image);
            $product->image=$image;
        }
        $product->save();
        return redirect('admin/product/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }

    public function xulydel($id)
    {
        $product = Product::find($id);
        $product->delete($id);
        return redirect('admin/product/ds')->with('thongbao','Xóa Thành Công');
    }
}
?>