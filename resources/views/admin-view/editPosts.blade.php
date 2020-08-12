@extends('../../master_layout/admin_master')


@section('title')
<title>EDIT POST</title>
@endsection


@section('page_header')
<section class="content-header">
    <h1>
        Edit POST
    </h1>
</section>
@endsection

@section('message')
@if ($errors->any())
<div class="callout callout-danger">
    <h4>Error!</h4>
    @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach

</div>
@endif
@endsection



@section('content')
<div class="row">  
    <!-- Horizontal Form -->
    <div class="box box-info">

        <!--        <div class="box-header with-border">
                    <h3 class="box-title">Add Post</h3>
                </div>-->
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{action('adminController\postController@post_edit_submit',$post->id)}}"  enctype="multipart/form-data">
            {{method_field('put')}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
            <div class="box-body">                                

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Lot No</label>
                    <div class="col-sm-10">
                        <input type="text" name="lot_no" class="form-control" id="" placeholder="lot_no" value="{{$post->lot_no}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="" placeholder="price Date" value="{{$post->price}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" name="status" class="form-control" id="" placeholder="status" value="{{$post->status}}">
                    </div>
                </div>                                    
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Phase</label>
                    <div class="col-sm-10">
                        <input type="number" name="phase" class="form-control" id="" placeholder="phase" value="{{$post->phase}}">
                    </div>                  
                </div>
                                         
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>                       
</div>
@endsection