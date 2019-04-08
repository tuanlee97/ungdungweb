@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Khách Hàng</h1>
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
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Create At</th>
                                <th style="width: 63px;">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $cus)
                            <tr class="odd gradeX" >
                                <td>{{$cus->id}}</td>
                                <td>{{$cus->name}}</td>
                                <td>{{$cus->gender}}</td>
                                <td>{{$cus->email}}</td>
                                <td>{{$cus->address}}</td>
                                <td>{{$cus->phone_number}}</td>

                                <td>{{$cus->created_at}}</td>
                                <td class="center">
                                    <a class="delete" href="admin/customer/xoa/{{$cus->id}}" style="list-style: none;"><i class="fa fa-trash-o" title="Xóa"></i>
                                    </a>
                                    <a href="admin/customer/sua/{{$cus->id}} " data-toggle="tooltip"><i class="fa fa-pencil" title="Cập nhật"></i></a>
                           
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
<div class="text-center">
<div >{{$customer->links()}}</div>
</div>
<!-- /.row -->

<!-- /.row -->

<!-- /.row -->

<!-- /.row -->
</div>

@endsection
