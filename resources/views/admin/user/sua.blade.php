@extends('admin.layouts.index')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sửa Nhân viên</h3>
                        </div>
                        <div class="panel-body">
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
                            

                            <form method="post" enctype="multipart/form-data" action="admin/user/sua/{{$user->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                     <div class="form-group">
                                        FullName<input class="form-control" placeholder="" name="fullname" type="text" value="{{$user->full_name}}">
                                    </div>

                                     <div class="form-group">
                                        Email<input class="form-control" placeholder="" name="email" type="text" value="{{$user->email}}"readonly>
                                    </div>

                                    <div class="form-group">
                                        Address<input class="form-control" placeholder="" name="address" type="text" value="{{$user->address}}">
                                    </div>

                                    <div class="form-group" >
                                        Phone<input class="form-control" placeholder="" name="phone" type="text" value="{{$user->phone}}">
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="changepassword" id="changepassword">
                                        Change Password<input class="form-control password" placeholder="" name="password" type="password" value="" disabled="">
                                    </div>

                                    <div class="form-group">
                                        Confirm<input class="form-control password" placeholder="" name="passwordagain" type="password" value="" disabled=""></div>
                                    {{-- <div class="form-group">
                                        Create_AT<input type="date" name="create_at" value="{{$tintuc->create_at}}">
                                    </div> --}}
                                    <!-- Change this to a button or input when using this as a form -->
                                      <button type="submit" class="btn btn-success">Submit</button>
                                      <button type="reset" class="btn btn-success">Reset</button>
                                </fieldset>
                            </form>
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
@endsection