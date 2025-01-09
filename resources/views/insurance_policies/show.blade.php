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
            <a>Insurance Policy</a>
        </li>
        <li class="active">
            <strong>Insurance Policy Details</strong>
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
    <h3 style="color:#1AB394;">Insurance Policy Details</h3>
    <hr>
    <form>
         
        
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="po_number">Policy Number</label>
                <input type="text" class="form-control" id="po_number" value="{{ $insurance_policies->po_number }}"  readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="policytype_name">Policy Type</label>
                <input type="text" class="form-control" id="policytype_name" value="{{ $insurance_policies->policytype_name }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="premium">Premium</label>
                <input type="text" class="form-control" id="premium" value="{{ $insurance_policies->premium }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="client_name">Client</label>
                <input type="text" class="form-control" id="client_name" value="{{ $insurance_policies->client_name }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 border p-2">
                <label for="product_name">Product</label>
                <input type="text" class="form-control" id="product_name" value="{{ $insurance_policies->product_name }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" value="{{ $insurance_policies->start_date }}" readonly>
            </div>
            
             <div class="form-group col-md-3 border p-2">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" value="{{ $insurance_policies->end_date }}" readonly>
            </div>
            <div class="form-group col-md-3 border p-2">
                <label for="status_name">Status</label>
                <input type="text" class="form-control" id="status_name" value="{{ $insurance_policies->status_name }}" readonly>
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
