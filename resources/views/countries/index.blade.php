@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2 style="color:#1AB394;"><strong>Countries</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Settings</a>
        </li>
        <li class="active">
            <strong>Countries</strong>
        </li>
    </ol>
</div>

</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5></h5>
        <div class="ibox-tools">
              <a href="{{Route('countries.create')}}" class="btn btn-primary btn-xs active">Add Country <i class="fa fa-plus"></i></a>
             <a href="{{url('upload-countries')}}" class="btn btn-success btn-xs active">Upload Countries <i class="fa fa-upload"></i></a>
             <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
            
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover Countries" >
    <thead>
    <tr class="font-bold text-navy">
        <th>NAME</th>
        <th>CODE</th>
        <th>LAST UPDATED</th>
        <th width="12%">ACTIONS</th>
    </thead>
    <tbody>

          @foreach($countries as $country)
                                                    <tr class="gradeX">
                                                    <td>{{$country->name}}</td>
                                                    <td>{{$country->ccode}}</td>
                                                    <td>{{$country->updated_at}}</td> 

                                                    <td>
    <a href="{{route('countries.edit',$country->id)}}"><button class="btn btn-primary  btn-xs active">Edit</button></a>

    

    {!! Form::open(['method' => 'DELETE','route' => ['countries.destroy', $country->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs active']) !!}
    {!! Form::close() !!}


                                                    </td>                                                 
                                                    </tr>
                                                @endforeach


   
      
 
    </tbody>
  
    </table>
        </div>

    </div>
</div>
</div>
</div>
</div>

                              
@endsection

@section('scripts')

<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('.Countries').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ]

    });

});

</script>

@endsection