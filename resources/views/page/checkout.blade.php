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
							<label for="name">Họ tên*</label>
							<input type="text" name="name" {{-- id="name" required --}} placeholder="Họ tên" >
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" {{-- id="email" required --}} placeholder="expample@gmail.com" name="email">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" {{-- id="adress" required --}} placeholder="Street Address"  name="address">
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" {{-- id="phone" required --}} name="phone_number">
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
												<span class="color-gray your-order-info">Đơn giá: {{$product['item']['unit_price']}}</span>
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
									<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} đ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							{{-- <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div> --}}

							<div class="text-center"><button class="beta-btn primary" type="submit" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
						<!-- Order Total -->
					{{-- 	<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">@if(Session::has('cart'))
												{{number_format(Session('cart')->totalPrice)}} đ
											@else 0 đ
											@endif</div>
							</div>
						</div> --}}

					{{-- 	<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Cancel</button>
							<button type="button" class="button cart_button_checkout" onclick="Redirect();" >Add to Cart</button>
					</div> --}}
				</div>
			</div>
		</div>
	</div>

@endsection	
{{-- @section('script')
<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="{{route('home')}}";
            }
            
           
         //-->
      </script>
<script src="source/js/cart_custom.js"></script>
@endsection --}}
