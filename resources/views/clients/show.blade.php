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
            <a>Clients</a>
        </li>
        <li class="active">
            <strong>Clients Details</strong>
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
<div class="ibox float-e-margins" style="border: 2px solid #1AB394; padding: 15px;">
    <div class="ibox-title">
        <h5></h5>
        <div class="ibox-tools">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-xs active">Back <i class="fa fa-level-up"></i></a>
             <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-home"></i></a> 
            
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
    <h3 style="color:#1AB394;">Clients Details</h3>
    <hr>
    <form>
         <div class="form-row">
            <div class="form-group text-center w-100">
               <img src="../{{$clients->photo }}" width="100px" height="50px" class="img-thumbnail"/>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $clients->name }}"  readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="id_number">ID | Passport Number</label>
                <input type="text" class="form-control" id="id_number" value="{{ $clients->id_number }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="email_address">Email</label>
                <input type="email" class="form-control" id="email_address" value="{{ $clients->email_address }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="primary_phone">Primary Phone</label>
                <input type="text" class="form-control" id="primary_phone" value="{{ $clients->primary_phone }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="country_name">Country</label>
                <input type="text" class="form-control" id="country_name" value="{{ $clients->country_name }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="description">Description</label>
                <input type="email" class="form-control" id="description" value="{{ $clients->description }}" readonly>
            </div>
            
             <div class="form-group col-md-3 border p-2">
                <label for="status_name">Status</label>
                <input type="text" class="form-control" id="status_name" value="{{ $clients->status_name }}" readonly>
            </div>
        </div>
       

  </form>

</div>
</div>
</div>
</div>
</div>
</div>

@endsection
