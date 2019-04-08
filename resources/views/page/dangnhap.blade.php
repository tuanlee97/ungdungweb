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
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">Đăng Nhập</div>

							<div class="single_post_quote text-center">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">        
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                            </div>
                            @endif
        
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif                          
                            <form role="form" action="{{route('dangnhap')}}" method="post">
                            <fieldset>
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>

                            </fieldset>
                        </form>
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
