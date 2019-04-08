@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-12">
                   <h1 class="page-header">Tin Tức
                    <small> Thêm</small>
                </h1>
                        </div>
                         <div class="col-lg-7" style="padding-bottom:120px">
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


                            <form method="post" enctype="multipart/form-data" action="admin/tintuc/them">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                        <label>Title</label><input class="form-control" placeholder="" name="title" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                      <label>Content</label>
                                      <textarea id="demo" class="ckeditor" name="content"></textarea>
                                    </div>
                                     <div class="form-group">
                                       <label>Images</label><input type="file" name="image">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                      <button type="submit" class="btn btn-success">Submit</button>
                                      <button type="reset" class="btn btn-success">Reset</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

@endsection
