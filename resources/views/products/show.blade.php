@extends('layouts.inspinia')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Products Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
            <i class="fa fa-play-circle" style="color:#1AB394;"></i>
        </li>
        <li>
            <a>Products</a>
        </li>
        <li class="active">
            <strong>Products Details</strong>
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
    <h3 style="color:#1AB394;">Products Details</h3>
    <hr>
    <form>
        
        <div class="form-row">
            <div class="form-group col-md-6 border p-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $products->name }}"  readonly>
            </div>
            <div class="form-group col-md-6 border p-2">
                <label for="insurercompany_name">Insurer Company Name</label>
                <input type="text" class="form-control" id="insurercompany_name" value="{{ $products->insurercompany_name }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 border p-2">
                <label for="productcategory_name">Email</label>
                <input type="text" class="form-control" id="productcategory_name" value="{{ $products->productcategory_name }}" readonly>
            </div>
            <div class="form-group col-md-6 border p-2">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" value="{{ $products->description }}" readonly>
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
