@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Clients Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Settings</a>
        </li>
        <li class="active">
            <strong>Clients</strong>
        </li>
    </ol>
    <p>
        
    </p>
    @include('includes.clients_header')
</div>

</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5></h5>
        <div class="ibox-tools">
             <a href="{{Route('clients.create')}}" class="btn btn-primary btn-xs active">Add Client  <i class="fa fa-plus"></i></a>
            
             <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
            
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover clients" >
    <thead>
    <tr class="font-bold text-navy">
        <th>IMAGE</th> 
        <th>NAME</th> 
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>ID NO</th>
        <th>COUNTRY</th> 
        <th>DESCRIPTION</th> 
        <th>STATUS</th>
        <th width="12%">ACTIONS</th>
    </thead>
    <tbody>

          @foreach($clients as $client)
                                                    <tr class="gradeX">
                                                    <td><img src="../{{$client->photo }}" width="40px" height="25px"/></td>
                                                    <td>{{$client->name}}</td>
                                                    <td>{{$client->primary_phone}}</td>
                                                    <td>{{$client->id_number}}</td>
                                                    <td>{{$client->email_address}}</td>
                                                    <td>{{$client->country_name}}</td> 
                                                    <td>{{$client->description}}</td> 
                                                    <td>{{$client->status_name}}</td>   

                                                    <td width="8%">
   <a href="{{route('clients.show',$client->id)}}" target="blank"><button class="btn btn-xs btn-success active"><i class="fa fa-eye" aria-hidden="true" title="View client"></i></button></a>                                                
    <a href="{{route('clients.edit',$client->id)}}"><button class="btn btn-primary  btn-xs active"><i class="fa fa-pencil" aria-hidden="true" title="Edit client"></i></button></a>

    

    {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
    <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs active']) !!} -->
     <button type="submit" class="btn btn-primary  btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete client"></i></button> 
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
    $('.clients').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Exampleclient'},
            {extend: 'pdf', title: 'Exampleclient'},

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