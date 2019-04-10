@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small> {{$products->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)

                <div class="alert alert-danger">
                    @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>

                @endif
                 @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/products/change/{{$products->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <fieldset>
                    <div class="form-group">
                        <p><label>Tên sản phẩm</label></p>

                        <input type="text" class="form-control input-width" name="name" placeholder="name of product" value="{{$products->name}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Chi tiết</label></p>
                        <input type="text" class="form-control input-width" name="description" placeholder="Nhập nội dung" value="{{$products->description}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Giá niêm yết</label></p>
                        <input type="text" class="form-control input-width" name="unit_price" placeholder="Giá niêm yết" value="{{$products->unit_price}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Giá khuyến mãi</label></p>
                        <input type="text" class="form-control input-width" name="promotion_price" placeholder="Giá khuyến mãi" value="{{$products->promotion_price}}" />
                    </div>
                        <div class="form-group">
                            <label>Tình trạng: </label>
                            <select name="new" class="form-control input-inline" style="width: 200px">

               
                                 <option value="0"@if($products->new=='0') selected='selected' @endif >Bình thường</option>
                                   <option value="1"@if($products->new=='1') selected='selected' @endif >Hàng mới</option>      
                            </select>
                           
                        </div>
                    <div class="form-group">
                        <p><label>Loại sản phẩm</label>
                        <select name="id_type" class="form-control input-width" >
                            <option class="form-control" value="{{$products->id_type}}">@foreach($typeproduct as $tp)
                                @if($tp->id == $products->id_type)
                                {{$tp->name}}
                                @endif
                                @endforeach</option>
                            <optgroup label="Loại sp" class="form-control" >
                                 @foreach($typeproduct as $tp)
                            <option class="form-control" value="{{$tp->id}}">{{$tp->name}}</option>
                            @endforeach
                             </optgroup>
                        </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <p><label>Image</label></p>
                
                        <img width="320px" src="source/images/product/{{$products->image}}" alt="">
                        <input type="file" name="image">
                    </div>



                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                </fieldset>
                    </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection
