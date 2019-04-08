@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi Tiết Đơn Hàng</h1>
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
                                <th>ID Bill</th>
                                <th>ID Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Create At</th>
                                <th>Update At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billdetail as $blldetail)
                            <tr class="odd gradeX" >
                                <td>{{$blldetail->id}}</td>
                                <td>{{$blldetail->id_bill}}</td>
                                <td>{{$blldetail->id_product}}</td>
                                <td>{{$blldetail->quantity}}</td>
                                <td>{{$blldetail->unit_price}}</td>
                                <td>{{$blldetail->created_at}}</td>
                                <td>{{$blldetail->updated_at}}</td>
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
<div class=" col-12">{{$billdetail->links()}}</div>
</div>

@endsection
