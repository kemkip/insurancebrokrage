@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2 style="color:#1AB394;"><strong>Insurer Company Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Settings</a>
        </li>
        <li class="active">
            <strong>Insurer Company</strong>
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
             <a href="{{Route('insurercompanies.create')}}" class="btn btn-primary btn-xs active">Add Insurer Company <i class="fa fa-plus"></i></a>
            
             <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
            
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover insurercompanies" >
    <thead>
    <tr class="font-bold text-navy">
        <th>NAME</th>
        <th>CONTACT NAME</th> 
        <th>EMAIL</th> 
        <th>PRIMARY PHONE</th>       
        <th>ALTERNATE PHONE</th>
        <th>ADDRESS</th> 
        <th>CONTACT EMAIL</th> 
        <th>STATUS</th> 
        <th width="12%">ACTIONS</th>
    </thead>
    <tbody>

          @foreach($insurercompanies as $insurercompany)
                                                    <tr class="gradeX">
                                                    
                                                    <td>{{$insurercompany->name}}</td>
                                                    <td>{{$insurercompany->contact_name}}</td>
                                                    <td>{{$insurercompany->email}}</td>
                                                    <td>{{$insurercompany->primary_phone}}</td>
                                                    <td>{{$insurercompany->alternative_phone}}</td> 
                                                    <td>{{$insurercompany->company_address}}</td>
                                                    <td>{{$insurercompany->contact_email}}</td>
                                                    <td>{{$insurercompany->status_name}}</td>      

                                                    <td width="8%">
   <a href="{{route('insurercompanies.show',$insurercompany->id)}}" target="blank"><button class="btn btn-xs btn-success active"><i class="fa fa-eye" aria-hidden="true" title="View insurercompany"></i></button></a>                                                
    <a href="{{route('insurercompanies.edit',$insurercompany->id)}}"><button class="btn btn-primary  btn-xs active"><i class="fa fa-pencil" aria-hidden="true" title="Edit insurercompany"></i></button></a>

    

    {!! Form::open(['method' => 'DELETE','route' => ['insurercompanies.destroy', $insurercompany->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
    <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs active']) !!} -->
     <button type="submit" class="btn btn-primary  btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete insurercompany"></i></button> 
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
    $('.insurercompanies').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Exampleinsurercompany'},
            {extend: 'pdf', title: 'Exampleinsurercompany'},

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