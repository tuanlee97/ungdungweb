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
					<div class="single_post_title">Đăng Ký</div>

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
                            <form method="post" enctype="multipart/form-data" action="" style="text-align: left;">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                        Họ Tên<input class="form-control" placeholder="" name="fullname" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Giới Tính<input style="margin-left: 50px; placeholder="" name="gender" type="radio" value="0" checked="">Nam
                                        <input style="margin-left: 50px; placeholder="" name="gender" type="radio" value="1">Nữ
                                    </div>
                                     <div class="form-group">
                                        Email<input class="form-control" placeholder="" name="email" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Địa chỉ<input class="form-control" placeholder="" name="address" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Số điện thoại<input class="form-control" placeholder="" name="phone" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Mật khẩu<input class="form-control" placeholder="" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        Nhập lại mật khẩu<input class="form-control" placeholder="" name="passwordagain" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                      <button type="submit" class="btn btn-success">Submit</button>
                                      <button type="reset" class="btn btn-success">Reset</button>
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
