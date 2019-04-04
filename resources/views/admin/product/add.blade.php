@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small> Thêm</small>
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
                <form action="admin/product/them" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <p><label>Name</label></p>
                        <input type="text" class="form-control input-width" name="name" placeholder="name" value="" />
                        <p><label>Descriptiom</p>
                        <input type="text" class="form-control input-width" name="description" placeholder="Nhập nội dung" value="" />
                        <p><label>Price</p>
                        <input type="text" class="form-control input-width" name="description" placeholder="Nhập gia" value="" />
                        <p><label>Image</label></p>
                        <input type="file" name="image"  class="form-control" >
                    </div>



                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection
