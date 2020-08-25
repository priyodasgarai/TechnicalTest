@extends('../../master-layout/admin_master')


@section('title')
<title>Section</title>
@endsection



@section('Main-content-header')
<h1>Section</h1>
<!--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>-->
@endsection

@section('custom_js')

@endsection
@section('Main-content')

<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <div class="input-group input-group-sm pull-left" style="width: 150px;">
                <input type="text" name="table_search" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="pull-right"> 
                <ul class="pagination pagination-sm no-margin">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
     <?php $sl = 1; ?>
     @if(!empty($sections))
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>SL No</th>
                <th>ID</th>
                <th>Name</th>                
                <th>Status</th>
                <th>Action</th>
            </tr>
            
             @foreach($sections as $data)
            <tr>
                <td>{{$sl}}</td>
                <td>{{ucwords($data->id)}}</td>
                <td>{{ucwords($data->name)}}</td>
                <td>{{ucwords($data->status)}}</td>               
                <td>{{ucwords($data->created_at)}}.</td>
            </tr>
           <?php $sl++; ?>
            @endforeach
        </table>
    </div>
     @else
        <div class="box-body table-responsive no-padding">
            <h3>  {{trans('messages.15')}} </h3>
        </div>
        @endif
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