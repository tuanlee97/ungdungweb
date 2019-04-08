@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đơn Hàng</h1>
            <form action="admin/bills/search" method="get" >
                <input type="text" class="form-control" placeholder="Search..." name="key" style="width: 250px">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </form>          
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
                   Danh Sách
               </div>
               <!-- /.panel-heading -->
               <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Customer</th>
                                <th>Date Order</th>
                                <th>Total Price</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Date Update</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $bll)
                            <tr class="odd gradeX" >
                                <td>{{$bll->id}}</td>
                                <td>{{$bll->id_customer}}</td>
                                <td>{{$bll->date_order}}</td>
                                <td>{{$bll->total}}</td>
                                <td>{{$bll->note}}</td>
                                <td>@if($bll->status==0)
                                  {{"Chờ xử lý"}}
                                  @elseif($bll->status==1)
                                  {{"Đã giao"}}
                                  @else
                                  {{"Đã hủy"}}
                                  @endif
                              </td>

                              <td>{{$bll->updated_at}}</td>
                              <td class="center">
                                <a class="delete" href="admin/bills/xoa/{{$bll->id}}" style="list-style: none;"><i class="fa fa-trash-o" title="Xóa"></i>
                                </a>
                                <a href="admin/bills/sua/{{$bll->id}}" data-toggle="tooltip"><i class="fa fa-pencil" title="Cập nhật"></i></a>
                                <a href="admin/billdetail/billdetail_idbill/{{$bll->id}}" ><i class="fa fa-eye" title="Chi tiết"></i></a>
                            </td>
                        </tr>
                        @endforeach
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
<div>{{$bill->links()}}</div>
<!-- /.row -->

<!-- /.row -->

<!-- /.row -->

<!-- /.row -->
</div>

@endsection
