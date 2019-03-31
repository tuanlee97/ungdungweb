<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
class BillDetailController extends Controller
{
    public function getDanhSach(){
    	$billdetail=BillDetail::paginate(5);
    	return view('admin.billdetail.danhsach',['billdetail'=>$billdetail]);
    }
    	public function getDetail($id){
		$billdetail_idbill=BillDetail::Where('id_bill',$id)->all();
		return view('admin.billdetail.billdetail_idbill',['billdetail_idbill'=>$billdetail_idbill]);
	}
}
