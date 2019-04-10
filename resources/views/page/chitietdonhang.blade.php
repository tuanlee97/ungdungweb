@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/styles/regular_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/regular_responsive.css">
@endsection
@section('content')
	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class=" container-fluid ">
					<div class="single_post_title">Chi Tiết Đơn Hàng</div>

							<div class="single_post_quote text-center">
        				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
        					<tr>
                                                        <th></th>
        						<th>Mã sản phẩm</th>
        						<th>Tên sản phẩm</th>
        						<th>Số lượng</th>
        						<th>Đơn giá</th>
        					</tr>
        					@foreach($billInfo as $bill)
        					<tr>
                                                        <td><a href="{{{ route('productdetails',$bill->id_product) }}}"><img src="source/images/{{$bill->image}}" alt="" style="max-height:40px;max-width: 30px"></a></td>
        						<td>{{$bill->id_product}}</td>
        						<td>{{$bill->name}}</td>
        						<td>{{$bill->quantity}}</td>
        						<td>{{$bill->unit_price}}</td>
        					</tr>
        					@endforeach
        				</table>
                            
                        </div>
					<div class="single_post_text">

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection	
@section('script')
<script src="source/js/regular_custom.js"></script>
@endsection
