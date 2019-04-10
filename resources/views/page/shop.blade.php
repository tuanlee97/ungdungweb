@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="source/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/shop_responsive.css">
@endsection
@section('content')
	<!-- Home -->
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="source/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">All Product</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
							<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach ($product_type as $loai)
								<li class="brand"><a href="{{route('producttype',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>

					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{count($product)}}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							
							@foreach($product as $sanpham)
								@if($sanpham->new == 1)
								<!-- Product Item New -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{route('productdetails',$sanpham->id)}}"><img src="source/images/product/{{$sanpham->image}}" alt=""></a></div>
								<div class="product_content">
									<div class="product_price"><a href="{{route('productdetails',$sanpham->id)}}">${{$sanpham->unit_price}}</a></div>
									<div class="product_name"><div><a href="{{route('productdetails',$sanpham->id)}}" tabindex="0">{{$sanpham->name}}</a></div></div>
								</div>
								
								<ul class="product_marks">
									<li class="product_mark product_new">new</li>
								</ul>
							</div>
							@endif

							@if($sanpham->promotion_price != 0)
							<!-- Product Item Discount -->
							<?php $discount = (($sanpham->unit_price - $sanpham->promotion_price)/ $sanpham->unit_price)*100;  ?>
							
							<div class="product_item discount">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{route('productdetails',$sanpham->id)}}"><img src="source/images/product/{{$sanpham->image}}" alt=""></a></div>
								<div class="product_content">
									<div class="product_price"><a href="{{route('productdetails',$sanpham->id)}}">${{$sanpham->promotion_price}}<span>${{$sanpham->unit_price}}</span></a></div>
									<div class="product_name"><div><a href="{{route('productdetails',$sanpham->id)}}" tabindex="0">{{$sanpham->name}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-{{round($discount)}}%</li>
								</ul>
							</div>
							@endif
							@if($sanpham->promotion_price == 0 && $sanpham->new == 0)
							<!-- Product Item Normal -->
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{route('productdetails',$sanpham->id)}}"><img src="source/images/product/{{$sanpham->image}}" alt=""></a></div>
								<div class="product_content">
									<div class="product_price"><a href="{{route('productdetails',$sanpham->id)}}">${{$sanpham->unit_price}}</a></div>
									<div class="product_name"><div><a href="{{route('productdetails',$sanpham->id)}}" tabindex="0">{{$sanpham->name}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>

							</div>
							@endif
							@endforeach
							

							

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div>
								{{$product->links()}}
							</div>
							

					</div>

				</div>
			</div>
		</div>
	</div>


	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							@foreach( $product_type as $hang)
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="source/images/category/{{$hang->image}}" alt=""></div></div>
							@endforeach

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection	
@section('script')
<script src="source/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="source/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="source/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="source/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/js/shop_custom.js"></script>
@endsection
