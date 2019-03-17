@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Product Type <small>List</small></h1>
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
{{-- 				<div class="panel-heading">
					DataTables Advanced Tables
				</div> --}}
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ID</th>
								<th>name</th>
								<th>description</th>
                                <th>Image</th>
                                {{-- <th>image</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach ($typeproduct as $tp)

							<tr class="odd gradeX">
								<td>{{$tp->id}}</td>
								<td>{{$tp->name}}</td>
                                <td>{{$tp->description}}</td>
                                <td><img width="100px" src="source/images/category/{{$tp->image}}" class="img-responsive" alt="Image"></td>
								<td class="center">
									<a href="admin/typeproducts/xoa/{{$tp->id}}" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
									</button>
									<a href="admin/typeproducts/sua/{{$tp->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

</div>
<!-- /#page-wrapper -->

@endsection
