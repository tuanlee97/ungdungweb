@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Product List</h1>
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
								<th>Tên sản phẩm</th>
								<th>Loại sản phẩm</th>
								<th>Chi tiết</th>
								<th>Giá niêm yết</th>
								<th> Giá khuyến mãi</th>
                                <th>Hình ảnh</th>

                                {{-- <th>image</th> --}}
                                <th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $pro)
							<tr class="odd gradeX">
								<td>{{$pro->id}}</td>
								<td>{{$pro->name}}</td>
								<td>
								@foreach($typeproduct as $tp)
								@if($tp->id == $pro->id_type)
								{{$tp->name}}
								@endif
								@endforeach
								</td>
								
                                <td>{{$pro->description}}</td>
                                <td>{{$pro->unit_price}}</td>
                                <td>{{$pro->promotion_price}}</td>
                                <td><img width="100px" src="source/images/product/{{$pro->image}}" class="img-responsive" alt="Image"></td>
								<td class="center">
									<a href="admin/products/del/{{$pro->id}}" style="list-style: none;"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Xoá"><i class="fa fa-trash-o"></i>
									</button>
									<a href="admin/products/change/{{$pro->id}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Sửa" aria-describedby="tooltip478219"><i class="fa fa-pencil"></i></a>
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
