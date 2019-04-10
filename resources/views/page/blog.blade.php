@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="source/styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/blog_responsive.css">
@endsection
@section('content')
<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="source/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Technological Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						@foreach($blog as $tintuc)
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url(source/images/tintuc/{{$tintuc->image}})"></div>
							<div class="blog_text">{{$tintuc->title}}</div>
							<div class="blog_button"><a href="{{route('blogdetails',$tintuc->id)}}">Continue Reading</a></div>
						</div>

				@endforeach
						
						
							

					</div>
					</div>
					<div class="shop_page_nav d-flex flex-row">
						
				</div>
						
			</div>
<div>
								{{$blog->links()}}
							</div>
		</div>

	</div>
@endsection	
@section('script')
<script src="source/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="source/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/js/blog_custom.js"></script>
@endsection
