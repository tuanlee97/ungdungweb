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
                    <div class="single_post_title">Thông Tin Tài Khoản</div>

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
                            <form method="post" enctype="multipart/form-data" action="{{{ route('taikhoan',Auth::guard('customer')->user()->id) }}}" style="text-align: left;">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                        Họ Tên<input class="form-control" placeholder="" name="fullname" type="text" value="{{Auth::guard('customer')->user()->name}}" style="color: black">
                                    </div>
                                    <div class="form-group">
                                        Giới Tính<input style="margin-left: 50px; placeholder="" name="gender" type="radio" value="0" @if(Auth::guard('customer')->user()->gender==0) checked="checked" @endif>Nam
                                        <input style="margin-left: 50px; placeholder="" name="gender" type="radio" value="1" @if(Auth::guard('customer')->user()->gender==1) checked="checked" @endif >Nữ
                                    </div>
                                     <div class="form-group">
                                        Email<input class="form-control" placeholder="" name="email" type="text" value="{{Auth::guard('customer')->user()->email}}" disabled="" style="color: black">
                                    </div>
                                    <div class="form-group">
                                        Địa chỉ<input class="form-control" placeholder="" name="address" type="text" value="{{Auth::guard('customer')->user()->address}}" style="color: black">
                                    </div>
                                    <div class="form-group">
                                        Số điện thoại<input class="form-control" placeholder="" name="phone" type="text" value="{{Auth::guard('customer')->user()->phone_number}}" style="color: black">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="changepassword" id="changepassword">
                                        Đổi mật khẩu<input class="form-control password" placeholder="Nhập mật khẩu cũ" name="oldpassword" type="password" value="" disabled="">
                                    </div>
                                    <div class="form-group">
                                        Nhập mật khẩu mới<input class="form-control password" placeholder="" name="password" type="password" value="" disabled="">
                                    </div>
                                    <div class="form-group">
                                        Nhập lại mật khẩu mới<input class="form-control password" placeholder="" name="passwordagain" type="password" value="" disabled="">
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
        <script>
            $(document).ready(function(){
                $("#changepassword").change(function(){
                        if($(this).is(":checked"))
                        {
                            $(".password").removeAttr('disabled');
                        }
                        else
                        {
                            $(".password").attr('disabled','');
                        }
                });
            });
        </script>
<script src="source/js/regular_custom.js"></script>
@endsection
