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
                        <div class="form-group" >
                            Tatus<select name="status">
                                <option value="1" selected="">1-Đã giao</option>
                                <option value="0">0-Hủy</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
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