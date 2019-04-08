@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi Tiết Đơn Hàng </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <div class="panel-heading">
                   Khách Hàng
               </div>
                <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <td>{{$customerInfo->id}}</td>
                            </tr>
                            <tr>
                                <th>Tên</th>
                                <td>{{$customerInfo->name}}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{$customerInfo->address}}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{$customerInfo->phone_number}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$customerInfo->email}}</td>
                            </tr>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <td>@foreach($billInfo as $key => $bill)
                                        {{($bill->id)}}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Ngày Đặt</th>
                                <td>
                                    {{date('d-m-Y', strtotime($customerInfo->date_order))}}
                                </td>
                            </tr>
                            <tr>
                                <th>Ghi chú</th>
                                <td>{{$customerInfo->note}}
                                </td>
                            </tr>
                            <tr>
                                <th>Tổng tiền</th>
                                <td>{{$customerInfo->total}}
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.table-responsive -->
                
            </div>
                <div class="panel-heading">
                   Chi tiết đơn hàng
               </div>
               <!-- /.panel-heading -->
               <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID Product</th>
                                <th>Name Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                {{-- <th>Create At</th>
                                <th>Update At</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billInfo as $bill)
                            <tr class="odd gradeX" >
                                <td>{{$bill->id_product}}</td>
                                <td>{{$bill->name}}</td>
                                <td>{{$bill->quantity}}</td>
                                <td>{{$bill->unit_price}}</td>
                                {{-- <td class="center">
                                    <a class="delete" href="" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
                                    </button></a>
                                    <a href="" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-pencil"></i></a>
                                </td> --}}
                            </tr>
                            @endforeach
                            <form method="post" enctype="multipart/form-data" action="admin/bills/sua/{{$bill->id}}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            <select name="status" class="form-control input-inline" style="width: 200px">
                                <option @if($customerInfo->status==0) selected="0" @endif value="0">Chưa giao</option>
                                <option @if($customerInfo->status==1) selected="1" @endif value="1">Đã giao</option>
                                <option @if($customerInfo->status==2) selected="2" @endif value="2">Hủy</option>
                            </select>

                            <input type="submit" value="Xử lý" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
				
            </div>
            <!-- /.panel-body -->

        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>

@endsection
