@extends('admin.layouts.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cập Nhật Đơn Hàng</h3>
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


                    <form method="post" enctype="multipart/form-data" action="admin/bills/sua/{{$bill->id}}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <fieldset>
                         <div class="form-group">
                            ID<input class="form-control" placeholder="" name="id" type="text" value="{{$bill->id}}" readonly="">
                        </div>
                        <div class="form-group">
                            ID Customer<input class="form-control" placeholder="" name="id_customer" type="text" value="{{$bill->id_customer}}"readonly>
                        </div>
                        <div class="form-group">
                            Date Order<input class="form-control" placeholder="" name="date_order" type="text" value="{{date('d-m-Y', strtotime($bill->date_order))}}"readonly>
                        </div>
                        <div class="form-group" >
                            Total Price<input class="form-control" placeholder="" name="total" type="text" value="{{ number_format($bill->total)}}"readonly>
                        </div>
                        <div class="form-group" >
                            Note<input class="form-control" placeholder="" name="note" type="text" value="{{$bill->note}}" readonly="">
                        </div>
                        <div class="col-md-4">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            <select name="status" class="form-control input-inline" style="width: 200px">
                                <option @if($bill->status==0) selected="selected" @endif value="0">Chưa giao</option>
                                <option @if($bill->status==1) selected="selected" @endif value="1">Đã giao</option>
                                <option @if($bill->status==2) selected="selected" @endif value="2">Hủy</option>
                            </select>
                            <input type="submit" value="Xử lý" class="btn btn-primary">
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

{{-- @section('script')  
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
@endsection --}}