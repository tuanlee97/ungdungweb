@extends('admin.layouts.index')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thêm Tin Tức</h3>
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


                            <form method="post" enctype="multipart/form-data" action="admin/tintuc/them">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                        Title<input class="form-control" placeholder="" name="title" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                      Content
                                      <textarea class="form-control" rows="5" name="content"></textarea>
                                    </div>
                                     <div class="form-group">
                                       Image<input type="file" name="image">
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
