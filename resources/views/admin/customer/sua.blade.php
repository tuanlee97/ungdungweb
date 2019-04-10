@extends('admin.layouts.index')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sửa Khách hàng</h3>
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
                            

                            <form method="post" enctype="multipart/form-data" action="admin/customer/sua/{{$customer->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                     <div class="form-group">
                                        Name<input class="form-control" placeholder="" name="name" type="text" value="{{$customer->name}}">
                                    </div>
                                           
                        <div class="form-group">
                            <label>Gender: </label>
                            <select name="gender" class="form-control input-inline" style="width: 200px">

               
                                 <option value="Nữ"@if($customer->gender=='Nữ') selected='selected' @endif >Nữ</option>
                                   <option value="Nam"@if($customer->gender=='Nam') selected='selected' @endif >Nam</option>      
                            </select>
                           
                        </div>
                   
                                     <div class="form-group">
                                        Email<input class="form-control" placeholder="" name="email" type="text" value="{{$customer->email}}">
                                    </div>
                                    <div class="form-group">
                                        Address<input class="form-control" placeholder="" name="address" type="text" value="{{$customer->address}}">
                                    </div>
                                    <div class="form-group" >
                                        Phone<input class="form-control" placeholder="" name="phone_number" type="text" value="{{$customer->phone_number}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="changepassword" id="changepassword">
                                        Change Password<input class="form-control password" placeholder="" name="password" type="password" value="" disabled="">
                                    </div>
                                    <div class="form-group">
                                        Confirm<input class="form-control password" placeholder="" name="passwordagain" type="password" value="" disabled="">
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







