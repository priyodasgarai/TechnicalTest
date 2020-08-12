@extends('../../master_layout/admin_master')


@section('title')
<title>ALL POSTS</title>
@endsection


@section('page_header')
<section class="content-header">
    <h1>
        Posts 
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
@if(Session::has('flash_message'))
<div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    {{Session::get('flash_message')}}<strong> !</strong> 
    {{Session::forget('flash_message')}}
</div>
@endif
@endsection



@section('custom_js')
<script>
    $(document).ready(function (){
        $("#bulk_edit").click(function () {
             var chkArray = [];
             $(".checkBoxClass:checked").each(function () {
            chkArray.push($(this).val());
        });
        if(chkArray.length != 0){
            var phase = $("#phase").val();
            var lot_no =  $("#lot_no").val();
            var price =  $("#price").val();
            var status =  $("#status").val();
             $.post('api/bulk-update',
                {
                    id: chkArray,
                    status: status,
                    phase: phase,
                    lot_no: lot_no,
                    price: price  
                }, function (data, status) {
                   // alert(data);
            if (data.result == true) {
                location.reload();
                swal("{{trans('messages.1')}}", "{{trans('messages.2')}}", "success");
            } else {
                location.reload();
                swal("{{trans('messages.4')}}", "{{trans('messages.3')}}", "error");
            }
        })
            
        }else{
            alert('Please select checkBox ') ;
        }      
        });
        
    });

</script>
@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="input-group-btn">
            <a  href="{{url('add-post')}}" class="btn btn-mini btn-primary pull-right button_class">CSV IMPORT</a>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">    
                <div class="col-md-12">
                    <div class="box-tools">
                        <div class="col-md-3"> <input type="text" id="lot_no"  class="form-control"  placeholder="lot_no"></div>
                        <div class="col-md-2"><input type="number" id="price"  class="form-control"  placeholder="price"></div>
                        <div class="col-md-2"><input type="text" id="status"  class="form-control"  placeholder="status"></div>
                        <div class="col-md-2"><input type="text" id="phase"  class="form-control"  placeholder="phase"></div>
                        <div class="col-md-3"> <button id="bulk_edit" class="btn btn-mini btn-primary pull-right button_class">Bulk Edit</button></div>
                    </div>
                </div>


            </div><!-- /.box-header -->

            @if(!empty($posts))
            <div class="box-body table-responsive no-padding">

                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Lot No</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Phase</th>
                        <th>{{trans('labels.20')}}</th>
                    </tr>
                    @foreach($posts as $cat) 
                    <tr>
                        <td><input type="checkbox" class="checkBoxClass" name="subject[]" value="{{$cat->id}}"></td>
                        <td>{{$cat->lot_no}}</td>
                        <td>{{$cat->price}}</td>                                            
                        <td>{{$cat->status}}</td>
                        <td>{{$cat->phase}}</td>
                        <td>
                            &nbsp;&nbsp;
                            <a href="{{ url('admin-post-edit-'.base64_encode($cat->id.'||'.env('APP_KEY')))}}"   class="btn btn-mini mergin_one" >
                                <i class="icon-edit"></i> {{trans('labels.14')}}
                            </a>

                            &nbsp;&nbsp;                            
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div><!-- /.box-body -->

            @else
            <div class="box-body table-responsive no-padding">
                <h3>  {{trans('messages.7')}} </h3>
            </div>
            @endif

        </div><!-- /.box -->
    </div>
</div>
@endsection