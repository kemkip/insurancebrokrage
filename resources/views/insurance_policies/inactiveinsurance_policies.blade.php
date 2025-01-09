@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Insurance Policy Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Settings</a>
        </li>
        <li class="active">
            <strong>Insurance Policy</strong>
        </li>
    </ol>
    <p>
        
    </p>
   @include('includes.policies_header')
</div>

</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5></h5>
        <div class="ibox-tools">
             <a href="{{Route('insurance_policies.create')}}" class="btn btn-primary btn-xs active">Add Insurance Policy  <i class="fa fa-plus"></i></a>
            
             <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
            
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover insurance_policies" >
    <thead>
    <tr class="font-bold text-navy">
        <th>PO NUMBER</th> 
        <th>STATUS</th> 
        <th>PHOPOLICY TYPE</th>
        <th>PREMIUM</th>
        <th>CLIENT</th>
        <th>PRODUCT</th> 
        <th>START DATE</th> 
        <th>END DATE</th>
        <th width="12%">ACTIONS</th>
    </thead>
    <tbody>

          @foreach($insurance_policies as $insurance_policy)
                                                    <tr class="gradeX">
                                                    <td>{{$insurance_policy->po_number}}</td>
                                                    <td>{{$insurance_policy->status_name}}</td>
                                                    <td>{{$insurance_policy->policytype_name}}</td>
                                                    <td>{{$insurance_policy->premium}}</td>
                                                    <td>{{$insurance_policy->client_name}}</td>
                                                    <td>{{$insurance_policy->product_name}}</td> 
                                                    <td>{{$insurance_policy->start_date}}</td> 
                                                    <td>{{$insurance_policy->end_date}}</td>   

                                                    <td width="8%">
   <a href="{{route('insurance_policies.show',$insurance_policy->id)}}" target="blank"><button class="btn btn-xs btn-success active"><i class="fa fa-eye" aria-hidden="true" title="View insurance_policy"></i></button></a>                                                
    <a href="{{route('insurance_policies.edit',$insurance_policy->id)}}"><button class="btn btn-primary  btn-xs active"><i class="fa fa-pencil" aria-hidden="true" title="Edit insurance_policy"></i></button></a>

    

    {!! Form::open(['method' => 'DELETE','route' => ['insurance_policies.destroy', $insurance_policy->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
    <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs active']) !!} -->
     <button type="submit" class="btn btn-primary  btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete insurance_policy"></i></button> 
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
    $('.insurance_policies').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Exampleinsurance_policy'},
            {extend: 'pdf', title: 'Exampleinsurance_policy'},

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