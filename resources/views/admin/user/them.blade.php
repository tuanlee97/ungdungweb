@extends('admin.layouts.index')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thêm User</h3>
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
                            

                            <form method="post" enctype="multipart/form-data" action="admin/user/them">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                        FullName<input class="form-control" placeholder="" name="fullname" type="text" value="">
                                    </div>
                                     <div class="form-group">
                                        Email<input class="form-control" placeholder="" name="email" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Address<input class="form-control" placeholder="" name="address" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Phone<input class="form-control" placeholder="" name="phone" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        Password<input class="form-control" placeholder="" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        Confirm<input class="form-control" placeholder="" name="passwordagain" type="password" value="">
                                    </div>
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