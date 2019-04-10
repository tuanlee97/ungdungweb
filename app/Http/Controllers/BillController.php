<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Bill;
use App\BillDetail;
class BillController extends Controller
{
	public function getDanhSach(){
		$bill=Bill::orderBy('id','desc')->paginate(5);
		return view('admin.bill.danhsach',['bill'=>$bill]);
	}
	public function delBill($id){
		$bill = Bill::find($id);
		if($bill->status==0)
		{
			return redirect()->back()->with('thongbao','Đơn hàng chờ xử lý,không được xóa');
		}
		else
		{
			$billdetail = BillDetail::Where('id_bill',$id);
			$bill->delete();
			$billdetail->delete();
			return redirect()->back()->with('thongbao','Xóa Thành Công');
		}
	}
	public function getSearch (Request $req)
	{

		$bill=Bill::Where('id','like','%'.$req->key.'%')
		->orWhere('id_customer','like','%'.$req->key.'%')->get();
		$key=$req->key;
		return view('admin/bill/search',compact('bill','key'));
	}
	public function getdonhang($id)
	{
		$billInfo=Bill::Where('id_customer',$id)->orderBy('id','desc')->get();
		return view('page.donhang',compact('billInfo'));
	}
	public function getChitietdonhang($id)
	{
		$billInfo = DB::table('bills')
		->join('bill_detail', 'bills.id', '=', 'bill_detail.id_bill')
		->leftjoin('products', 'bill_detail.id_product', '=', 'products.id')
		->where('bills.id', '=', $id)
		->select('bill_detail.id_product','products.name','products.image','bill_detail.unit_price','bills.total','bills.date_order','bills.note','bill_detail.quantity','bills.id')
		->get();
		return view('page.chitietdonhang',compact('billInfo'));
	}
	public function getSua($id){
		$bill=Bill::find($id);
		return view('admin/bill/sua',['bill'=>$bill]);
	}
	public function postSua(Request $request, $id){
		$date= date('Y-m-d H:i:s');
		$bill=Bill::find($id);
		if($bill->status==0)
		{
			if($request->status==0)
			{
				return redirect()->back();
			}
			else
			{
				$bill->status =$request->status;
				$bill->updated_at = $date;
				$bill->save();
				return redirect()->back()->with('thongbao','Cập Nhật Thành Công');
			}
		}
		else
		{
			return redirect()->back()->with('thongbao','Thất Bại, Đơn Hàng Chỉ Được Cập Nhật 1 Lần');
		}
	}

}
