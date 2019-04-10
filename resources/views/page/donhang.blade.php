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
                                <div class=" container-fluid ">
                                        <div class="single_post_title">Theo Dõi Đơn Hàng</div>

                                                        <div class="single_post_quote text-center">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tr>
                                                        <th>Mã đơn</th>
                                                        <th>Ngày mua</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                </tr>
                                                @foreach($billInfo as $bill)
                                                <tr>
                                                        <td><a href="{{ route('chitietdonhang',$bill->id) }}">{{$bill->id}}</a></td>
                                                        <td>{{$bill->date_order}}</td>
                                                        <td>{{$bill->total}}</td>
                                                        <td>
                                                                @if($bill->status==0)
                                                                {{'Chờ xử lý'}}
                                                                @elseif($bill->status==1)
                                                                {{'Đã giao'}}
                                                                @else
                                                                {{'Đã hủy'}}
                                                                @endif
                                                        </td>
                                                </tr>
                                                @endforeach
                                        </table>
                            
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
