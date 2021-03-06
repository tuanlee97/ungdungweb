@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tour
                    <small> {{$typeproducts->name}}</small>
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
                <form action="admin/typeproducts/sua/{{$typeproducts->id}}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                       <fieldset>
                    <div class="form-group">
                    
                        <p><label>Loại sản phẩm</label></p>

                        <input type="text" class="form-control input-width" name="name" placeholder="Nhập Tên loại" value="{{$typeproducts->name}}" />
                    </div>
                    <div class="form-group">
                        <p><label>Mô tả</label></p>
                        <input type="text" class="form-control input-width" name="description" placeholder="Nhập nội dung" value="{{$typeproducts->description}}" />
                    </div>

                    <div class="form-group">
                        <p><label>Hình</label></p>

            
                        <img width="320px" src="source/images/category/{{$typeproducts->image}}" alt="">
                        <input type="file" name="image"  value="">
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
