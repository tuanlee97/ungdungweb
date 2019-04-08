<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\BillDetail;
use App\Customer;
class BillDetailController extends Controller
{
	public function getDanhSach(){
		$billdetail=BillDetail::paginate(10);
		return view('admin.billdetail.danhsach',['billdetail'=>$billdetail]);
	}
	public function getDetail($id){
		$customerInfo = DB::table('bill_detail')
		->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
		->join('customer','customer.id','=','bills.id_customer')
		->select('customer.*','bills.total','bills.note','bills.status','bills.date_order')
		->where('bills.id', '=', $id)
		->first();
		$billInfo = DB::table('bills')
		->join('bill_detail', 'bills.id', '=', 'bill_detail.id_bill')
		->leftjoin('products', 'bill_detail.id_product', '=', 'products.id')
		->where('bills.id', '=', $id)
		->select('bill_detail.id_product','products.name','bill_detail.unit_price','bills.total','bills.date_order','bills.note','bill_detail.quantity','bills.id')
		->get();
		$this->data['customerInfo'] = $customerInfo;
		$this->data['billInfo'] = $billInfo;
		//dd($customerInfo);
		//dd($billInfo);

		return view('admin.billdetail.billdetail_idbill', $this->data);
		//$billdetail_idbill=BillDetail::Where('id_bill',$id)->get();
		//dd($billdetail_idbill);
	// 	return view('admin.billdetail.billdetail_idbill',['billdetail_idbill'=>$billdetail_idbill]);
	}
}
