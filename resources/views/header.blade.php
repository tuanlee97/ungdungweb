	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="source/images/phone.png" alt=""></div>+84 395 563 446</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="source/images/mail.png" alt=""></div><a href="mailto:letuan30697@gmail.com">letuan30697@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
								
								</ul>
							</div>
								@if(Auth::guard('customer')->check())
							<div class="btn-group" style="padding-top: 10px">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{Auth::guard('customer')->user()->name}}
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="taikhoan">Tài khoản</a>
									<a class="dropdown-item" href="donhang/{{Auth::guard('customer')->user()->id }}}">Đơn hàng</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="dangxuat">Đăng Xuất</a>
								</div>
							</div>
							@else
							<div class="top_bar_user">
								<div class="user_icon"><img src="source/images/user.svg" alt=""></div>
								<div><a href="{{ route('dangky') }}">Register</a></div>
								<div><a href="{{ route('dangnhap') }}">Sign in</a></div>
							</div>
								@endif
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{route('home')}}">Cellphone+</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{route('search')}}" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="key">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"></span>
												
												<ul class="custom_list clc">
													
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="source/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="source/images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"></div>
									<div class="wishlist_count"></div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="source/images/cart.png" alt="">
										<div class="cart_count"><span>
											@if(Session::has('cart'))
												{{Session('cart')->totalQty}}
											@else 0 
											@endif
										 </span>
										</div>
									</div>
									<div class="cart_content">
							
										<div class="cart_text"><a href="{{route('cart')}}">Cart</a></div>
										<div class="cart_price">
												@if(Session::has('cart'))
									{{$totalPrice}} $ 
									
								@endif
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									@foreach($loai_sp as $loai)
									<li><a href="{{route('producttype',$loai->id)}}">{{$loai->name}}<i class="fas fa-chevron-right ml-auto"></i></a></li>
									@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="{{route('home')}}">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('shop')}}">Shop<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('about')}}">About us<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('blog')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('contact')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
	</header>