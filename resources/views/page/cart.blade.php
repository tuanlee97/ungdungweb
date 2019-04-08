@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/cart_responsive.css">
     {{-- <script type="text/javascript">
     	function updateCart(qty,rowId){
     		$.get('{{ asset('updatecart') }}',
     		{qty:qty,rowId:rowId},
     		function(){
     			location.reload();
     		}
     		);
     	}
     </script> --}}
     @endsection
     @section('content')
     <!-- Cart -->
     <div class="cart_section">
     	@if(session('thongbao'))
     	<div class="alert alert-success">
     		{{session('thongbao')}}
     	</div>
     	@endif
     	<div class="container">
     		<div class="row">
     			<div class="col-lg-10 offset-lg-1">
     				<div class="cart_container">
     					<div class="cart_title">Shopping Cart</div>
     					<div class="cart_items">
     						<ul class="cart_list">
     							<li class="cart_item clearfix" style="max-height: 70px">

     								<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between" style="width: 100%;">
     									<div class="cart_item_name cart_info_col">
     										<div class="cart_item_title"></div>
     									</div>
     									<div class="cart_item_name cart_info_col">
     										<div class="cart_item_title">Name</div>
     									</div>
     									<div class="cart_item_quantity cart_info_col">
     										<div class="cart_item_title">Quantity</div>
     									</div>
     									<div class="cart_item_price cart_info_col">
     										<div class="cart_item_title">Price</div>
     									</div>
     									<div class="cart_item_total cart_info_col">
     										<div class="cart_item_title">Total</div>
     									</div>
     									<div class="cart_item_total cart_info_col">
     										<div class="cart_item_title">Remove</div>
     									</div>
     								</div>
     							</li>
     							@if(Session::has('cart'))
     							@foreach ($product_cart as $product)
     							<li class="cart_item clearfix">
     								<div class="cart_item_image"><img src="source/images/{{$product['item']['image']}}" alt="" style="    max-width: 60px;
     								max-height: 70px;"></div>
     								<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
     									<div class="cart_item_name cart_info_col" style="    width: 68px;">
     										<div class="cart_item_text">{{$product['item']['name']}}</div>
     									</div>
{{-- 										<div class="cart_item_color cart_info_col">
											<div class="cart_item_text""><span style="background-color:#999999; "></span>Silver</div>
										</div> --}}
										<div class="cart_item_quantity cart_info_col">

											<div class="cart_item_text"><a href="{{route('reducecart',$product['item']['id'])}}">-  </a>{{$product['qty']}}<a href="{{route('addcart2',$product['item']['id'])}}">  +</a></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_text">
												@if($product['item']['promotion_price']>0)
												{{number_format($product['item']['promotion_price'])}}
												
												@else
												{{number_format($product['item']['unit_price'])}}
												@endif
											</div>
											
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_text">
                                                            @if($product['item']['promotion_price']>0)
                                                            {{number_format($product['item']['promotion_price'])*$product['qty']}}
                                                            
                                                            @else {{number_format($product['item']['unit_price'])*$product['qty']}}
                                                            @endif
											</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_text"><a href="{{ route('deletecart',$product['item']['id']) }}">Remove</a></div>
										</div>
									</div>
								</li>
								@endforeach
								@endif
							</ul>
						</div>
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">@if(Session::has('cart'))
									{{$totalPrice}} $ 
									@else 0 $
								@endif</div>
							</div>
						</div>

						<div class="cart_buttons">
                                  
							<button type="button" class="button cart_button_clear" onclick="RedirectShop()" >Cancel</button>
							<button type="button" class="button cart_button_checkout" onclick="Redirect()" > Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		@endsection	
		@section('script')
		<script type="text/javascript">
			<!--
				function Redirect()
                     {
             
					window.location="{{route('checkout')}}";
				}
                    function RedirectShop()
                     {
             
                         window.location="{{route('shop')}}";
                    }


         //-->
     </script>
     <script src="source/js/cart_custom.js"></script>
     @endsection
