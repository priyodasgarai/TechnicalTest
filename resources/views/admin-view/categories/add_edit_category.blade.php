@extends('../../master-layout/admin_master')


@section('title')
<title>{{$title}}</title>
@endsection



@section('Main-content-header')
<h1>{{$title}}</h1>
<!--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>-->
@endsection

@section('Main-content')
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
    <div class="box-header with-border">
        <!--          <h3 class="box-title">{{$title}}</h3>         -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <form role="form" method="post" action="{{url('/admin/add-edit-category')}}" name="" id="" enctype="multipart/form-data">
                @csrf
                <!-- text input -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.34')}}</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" value="" />
                    </div>
                    <div id="append_categories_level">
                        @include('Admin-view.categories.append_categories_level')
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Section</label>
                        @if(!empty($getSection))
                        <select class="form-control select2" name="section_id" id="section_id" style="width: 100%;">
                            <option value="" selected="selected">Select</option>
                            @foreach($getSection as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>{{trans('labels.35')}}</label>
                        <input type="file"  name="category_image" id="category_image" class="form-control" accept="image/*">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.36')}}</label>
                        <input type="number"  name="category_discount" id="category_discount" class="form-control" placeholder="Enter category discount">
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label>{{trans('labels.38')}}</label>
                        <textarea class="form-control" rows="3" name="category_description" id="category_description" placeholder="Enter ..."></textarea>                
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.37')}}</label>
                        <input type="text"  name="category_url" id="category_url" class="form-control" placeholder="Enter category url">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>{{trans('labels.39')}}</label>
                        <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter ..."></textarea>                

                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.40')}}</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="Enter ..."></textarea>  
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>{{trans('labels.41')}}</label>
                        <textarea class="form-control" rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter ..."></textarea>  
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" placeholder="{{trans('labels.21')}}">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->
@endsection



@section('Main-content-error-message')
@if(Session::has('flash_message'))  
<div class="alert alert-danger alert-dismissable show" role="alert">     
    {{Session::get('flash_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::forget('flash_message')}}
</div>
@endif
@if(Session::has('success_message'))
<div class="alert alert-success alert-dismissable" role="alert">  
    {{Session::get('success_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>    
</div>
@endif
@if(Session::has('error_message'))
<div class="alert alert-danger alert-dismissable show" role="alert">     
    {{Session::get('error_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

@section('custom_css')
<link rel="stylesheet" href="{{asset('public/admin-asset/css/select2.min.css')}}">
@endsection
@section('custom_js')
<script src="{{asset('public/admin-asset/js/select2.full.min.js')}}"></script>
<script>
$(function () {
//Initialize Select2 Elements
    $('.select2').select2();
});

$('#section_id').change(function () {
    var section_id = $(this).val();
    $.post('append-categories-level',
            {
                "_token": "{{ csrf_token() }}",
                section_id: section_id
            }, function (data, status, xhr) {
        // console.log(data);
        $("#append_categories_level").html(data);
    });
});

</script>
@endsection