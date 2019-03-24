<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TinTuc;

use Illuminate\Database\Eloquent\Model;
class TinTucController extends Controller
{

	public $timestamps = false;
    public function getDanhSach(){
     $tintuc = TinTuc::all();
     return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);

 }
 public function getSua($id){
  $tintuc = TinTuc::find($id);
  return view('admin.tintuc.sua',['tintuc'=>$tintuc]);
}
public function postSua(Request $request,$id){
  $tintuc = TinTuc::find($id);
  $this->validate($request,
   [
     'title' => 'required|min:10|max:100'
 ],
 [
     'title.required'=>'Bạn chưa nhập tiêu đề',
     'title.unique'=>'Tiêu đề đã tồn tại',
     'title.min'=>'Tên tiêu đề phải chứa ít nhất 10 kí tự',
     'title.max'=>'Tên tiêu đề phải chứa ít nhất 100 kí tự',
     'content.required'=>'Bạn chưa nhập nội dung',
 ]);
  $tintuc->id = $request->id;
  $tintuc->title = $request->title;
  $tintuc->content = $request->content;
    	// $tintuc->create_at = $request->create_at;
		//$tintuc->update_at = $request->updated_at;
  if($request->hasFile('image'))
  {
      $file = $request->file('image');

      $name = $file->getClientOriginalName();
      $hinhanh = " ".$name;
      $file->move("source/images/tintuc",$hinhanh);
      $tintuc->image = $hinhanh;

  }
  $tintuc->save();
  return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');

}


public function getThem(){
   return view('admin.tintuc.them');
}
public function postThem(Request $request){
   $this->validate($request,
       [
         'title' => 'required|min:10|max:100',
         'image'=>'required'
     ],
     [
        'image.required'=>'Bạn chưa thêm ảnh',
        'title.required'=>'Bạn chưa nhập tiêu đề',
        'title.unique'=>'Tiêu đề đã tồn tại',
        'title.min'=>'Tên tiêu đề phải chứa ít nhất 10 kí tự',
        'title.max'=>'Tên tiêu đề phải chứa ít nhất 100 kí tự',
        'content.required'=>'Bạn chưa nhập nội dung',
    ]);

   $tintuc = new TinTuc();
   $tintuc->title = $request->title;
   $tintuc->content = $request->content;
   if($request->hasFile('image'))
   {
      $file = $request->file('image');

      $name = $file->getClientOriginalName();
      $hinhanh = " ".$name;
      $file->move("source/images/tintuc",$hinhanh);
      $tintuc->image = $hinhanh;

  }
  $tintuc->save();
  return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
}

public function getXoa($id){
   $tintuc = TinTuc::find($id);
   $tintuc->delete();

   return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
}
}
