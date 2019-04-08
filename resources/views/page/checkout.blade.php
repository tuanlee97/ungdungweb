@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/style.css">
<link rel="stylesheet" type="text/css" href="source/styles/cart_responsive.css">
@endsection
@section('content')
		<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
						</div>
						<div class="container">
		<div id="content">
			<form action="{{{ route('savecheckout') }}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<input type="text" name="id"  placeholder="Họ tên" value="{{Auth::guard('customer')->user()->id}}" hidden="" >
						</div>
						<div class="form-block">
							<label for="name">Name</label>
							<input type="text" name=""  placeholder="Họ tên" value="{{Auth::guard('customer')->user()->name}}" >
						</div>
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" {{-- id="email" required --}} placeholder="expample@gmail.com" name="" value="{{Auth::guard('customer')->user()->email}}">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" {{-- id="adress" required --}} placeholder="Street Address"  name="" value="{{Auth::guard('customer')->user()->address}}">
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text"  name="" value="{{Auth::guard('customer')->user()->phone_number}}">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
									@foreach ($product_cart as $product)
										<div class="media">
											<img width="25%" src="source/images/{{$product['item']['image']}}" alt="" class="pull-left" style="padding: 5px">
											<div class="media-body">
												<p class="font-large">{{$product['item']['name']}}</p>
												<span class="color-gray your-order-info">Đơn giá: {{$product['item']['unit_price']}} $</span>
												<span class="color-gray your-order-info">Số lượng: {{$product['qty']}}</span>
											</div>
										</div>
										@endforeach
									@endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền: </p></div>
									<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} $</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							

							<div class="text-center"><button class="beta-btn primary" type="submit" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
						<!-- Order Total -->
				

				
				</div>
			</div>
		</div>
	</div>

@endsection	
