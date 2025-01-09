@extends('layouts.inspinia')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Insurer Company Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Insurer Company</a>
        </li>
        <li class="active">
            <strong>Insurer Company Details</strong>
        </li>
    </ol>
    <p>
        
    </p>
   
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
    <h3 style="color:#1AB394;">Insurer Company Details</h3>
    <hr>
    <form>
        
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $insurercompanies->name }}"  readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" value="{{ $insurercompanies->contact_name }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $insurercompanies->email }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="primary_phone">Primary Phone</label>
                <input type="text" class="form-control" id="primary_phone" value="{{ $insurercompanies->primary_phone }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="alternative_phone">Alternative Phone</label>
                <input type="text" class="form-control" id="alternative_phone" value="{{ $insurercompanies->alternative_phone }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" value="{{ $insurercompanies->contact_email }}" readonly>
            </div>
             <div class="form-group col-md-3 border p-2">
                <label for="company_address">Company Address</label>
                <input type="text" class="form-control" id="company_address" value="{{ $insurercompanies->company_address }}" readonly>
            </div>
             <div class="form-group col-md-3 border p-2">
                <label for="status_name">Status</label>
                <input type="text" class="form-control" id="status_name" value="{{ $insurercompanies->status_name }}" readonly>
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
