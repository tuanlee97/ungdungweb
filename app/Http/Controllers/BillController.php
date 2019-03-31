<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;

class BillController extends Controller
{
	public function getDanhSach(){
		$bill = Bill::paginate(3);
		return view('admin.bill.danhsach',['bill'=>$bill]);
	}
	public function delBill($id){
		$bill = Bill::find($id);
        $bill->delete();
        return redirect('admin/bill/danhsach')->with('thongbao','Xóa Thành Công');
	}
	public function getSua($id){
		$bill=Bill::find($id);
		return view('admin/bill/sua',['bill'=>$bill]);
	}
	public function postSua(Request $request, $id){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date= date('Y-m-d H:i:s');
		$bill=Bill::find($id);
		$bill->status =$request->status;
  		$bill->updated_at = $date;
        $bill->save();
        return redirect('admin/bills/danhsach')->with('thongbao','Cập Nhật Thành Công');
	}

}
