<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product;

class productsController extends Controller
{
    public function getds()
    {
        $products = Product::all();
        return view('admin.products.products',['products'=>$products]);
    }
    public function getadd()
    {
        return view('admin.products.add');
    }

    public function xulyadd(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
        $this->validate($request,
            [
                'name'=>'required|unique:products,name|min:3|max:100',
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

        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price= $request->unit_price;
        $products->promotion_price= $request->promotion_price;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/products/add')->with('thongbao','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("source/images/product/",$image);
            $products->image=$image;
        }
        $products->save();
        return redirect('admin/products/add')->with('thongbao','Thêm Thành Công');
    }

    public function getchange($id)
    {
        $products = Product::find($id);
        return view('admin.products.change',['products'=>$products]);
    }
    public function xylychange(Request $request,$id)
    {
        $products = Product::find($id);
        $this->validate($request,
            [
            
                'name'=>'required|min:3|max:100'
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
        $products->id=$request->id;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/products/change/'.$id)->with('thongbao','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
            $image="".$name;
            $file->move("source/images/product/",$image);
            $products->image=$image;
        }
        $products->save();
        return redirect('admin/products/change/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }

    public function xulydel($id)
    {
        $products = Product::find($id);
        $products->delete($id);
        return redirect('admin/products/ds')->with('thongbao','Xóa Thành Công');
    }
}
?>