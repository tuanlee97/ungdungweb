@extends('admin.layouts.index')
@section('content')
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
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
                                            <th>FullName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $u)
                                        <tr class="odd gradeX" >
                                            <td>{{$u->id}}</td>
                                            <td>{{$u->full_name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->phone}}</td>
                                            <td>{{$u->address}}</td>
                                            <td class="center"></i><a href="admin/user/xoa/{{$u->id}}"><i class="fa fa-trash-o fa-fw"></a></td>
                                            <td class="center"><a href="admin/user/sua/{{$u->id}}"><i class="fa fa-pencil fa-fw"></i></a></td>
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
            <!-- /.row -->
           
            <!-- /.row -->
           
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
   @endsection

     