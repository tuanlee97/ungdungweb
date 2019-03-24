@extends('admin.layouts.index')

@section('content')

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sửa Tin Tức</h3>
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


                            <form method="post" enctype="multipart/form-data" action="admin/tintuc/sua/{{$tintuc->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <fieldset>
                                    <div class="form-group">
                                       ID<input disabled="disabled" class="form-control" placeholder="" name="id" type="text" value="{{$tintuc->id}}" autofocus>
                                    </div>
                                    <div class="form-group">
                                        Title<input class="form-control" placeholder="" name="title" type="text" value="{{$tintuc->title}}">
                                    </div>
                                     <div class="form-group">
                                        Content<input class="form-control" placeholder="" name="content" type="text" value="{{$tintuc->content}}">
                                    </div>
                                     <div class="form-group">
                                        <img width="320px" src="image/tintuc/{{$tintuc->image}}" alt="">
                                       Image<input type="file" name="image">
                                    </div>
                                    {{-- <div class="form-group">
                                        Create_AT<input type="date" name="create_at" value="{{$tintuc->create_at}}">
                                    </div> --}}
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
