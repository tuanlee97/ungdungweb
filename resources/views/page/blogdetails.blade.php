@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="source/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="source/styles/blog_single_styles.css">
<link rel="stylesheet" type="text/css" href="source/styles/blog_single_responsive.css">
@endsection
@section('content')
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="source/images//shop_background.jpg" data-speed="0.8"></div>
	</div>

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">{{$blog->title}}</div>
					<div class="single_post_text">
						<p>{{$blog->content}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog Posts -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						@foreach ( $otherblog as $other)
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url(source/images/{{$other->image}})"></div>
							<div class="blog_text">{{$other->title}}</div>
							<div class="blog_button"><a href="{{route('blogdetails',$other->id)}}">Continue Reading</a></div>
						</div>
						@endforeach

					</div>
				</div>	
			</div>
			<div>
				{{$otherblog->links()}}
			</div>
		</div>
	</div>

@endsection	
@section('script')
<script src="source/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="source/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/js/blog_single_custom.js"></script>
</body>
@endsection
