<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class TypeProductsController extends Controller
{
    public function getDanhsach()
    {
        $typeproduct = ProductType::all();
        return view('admin.typeproducts.danhsach',['typeproduct'=>$typeproduct]);
    }
    public function getThem()
    {
        return view('admin.typeproducts.them');
    }

    public function XuLyThem(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'name'=>'required|unique:type_products,name|min:3|max:100',
                'image'=>'required'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'image.required'=>'Bạn chưa thêm ảnh',
                'name.required'=>'Bạn chưa nhập Tên!',
                'name.unique' => 'Tên đã tồn tại, vui lòng nhập lại!',
                'name.min'=>'Tên phải gồm ít nhất 3 ký tự!',
                'name.max'=>'Tên phải gồm tối đa 100 ký tự!'
            ]);


        // Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

        $typeproducts = new ProductType;
        $typeproducts->name = $request->name;
        $typeproducts->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/typeproducts/them')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image=str_random(4)."_".$name;
            while (file_exists("source/images/category/".$image)) {
                $image=str_random(4)."_".$name;
            }
            $file->move("source/images/category/",$image);
            $typeproducts->image=$image;
        }
        $typeproducts->save();
        return redirect('admin/typeproducts/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        $typeproducts = ProductType::find($id);
        return view('admin.typeproducts.sua',['typeproducts'=>$typeproducts]);
    }
    public function XuLySua(Request $request,$id)
    {
        $typeproducts = ProductType::find($id);
        $this->validate($request,
            [
                'name'=>'required|unique:type_products,name|min:3|max:100'
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
<<<<<<< HEAD
         $ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
        $typeproducts = new ProductType;
=======

>>>>>>> c67a1ada01be40a9946a1370e1335cdd0e0ecbf9
        $typeproducts->name = $request->name;
        $typeproducts->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/typeproducts/sua/'.$id)->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image=str_random(4)."_".$name;
            while (file_exists("source/images/category/".$image)) {
                $image=str_random(4)."_".$name;
            }
            $file->move("source/images/category/",$image);
            $typeproducts->image=$image;
        }
        $typeproducts->created_at = '2019-03-23 21:44:31';
        $typeproducts->updated_at = '2020-03-23 01:45:31';
        $typeproducts->save();

        return redirect('admin/typeproducts/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }

    public function XuLyXoa($id)
    {
        $typeproducts = ProductType::find($id);
        $typeproducts->delete();
        return redirect('admin/typeproducts/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
