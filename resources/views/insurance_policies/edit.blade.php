@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Insurance Policy Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>Insurance Policy</a>
        </li>
        <li class="active">
            <strong>Edit</strong>
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
            <h5>Edit Insurance Policy</h5>
            <div class="ibox-tools">
                <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-insurance_policy">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            @if (count($errors) > 0)

            <div class="alert alert-danger">


            <ul>

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

            </ul>

            </div>

            @endif 
          
      
             {!! Form::model($insurance_policy, ['method' => 'PATCH', 'enctype'=>'multipart/form-data','route' => ['insurance_policies.update', $insurance_policy->id]]) !!}

         
                <div class="form-body row">  
                <div class="form-group form-md-line-input col-md-12">
                
                <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Status</label>
                    <select name="status_id"  class="form-control fstdropdown-select" >

                        @foreach($statuses as $status)                            
                        <option value="{{$status->id}}" {{$status->id == $insurance_policy->status_id ? 'selected' : ''}}> {{$status->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>
                    <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Policy Type</label>
                    <select name="policytype_id"  class="form-control fstdropdown-select" >

                        @foreach($policytypes as $policytype)                            
                        <option value="{{$policytype->id}}" {{$policytype->id == $insurance_policy->policytype_id ? 'selected' : ''}}> {{$policytype->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>

                     <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Client</label>
                    <select name="client_id"  class="form-control fstdropdown-select" >

                        @foreach($clients as $client)                            
                        <option value="{{$client->id}}" {{$client->id == $insurance_policy->client_id ? 'selected' : ''}}> {{$client->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>

                    <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Product</label>
                    <select name="product_id"  class="form-control fstdropdown-select" >

                        @foreach($products as $product)                            
                        <option value="{{$product->id}}" {{$product->id == $insurance_policy->product_id ? 'selected' : ''}}> {{$product->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>
                    

                 
                
                </div>               
             

                <div class="form-group form-md-line-input col-md-12">
                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Premium</label>
                        <input type="text" name="premium" class="form-control" value="{{$insurance_policy->premium}}" placeholder="3000000" >
                            <div class="form-control-focus"> </div>
                      
                    </div>
                   


                    <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Start Date</label>
                    <input type="date" name="start_date" class="form-control daily" placeholder="DD/MM/YYYY e.g 01/01/2020" value="{{$insurance_policy->start_date}}">
                    <div class="form-control-focus"> </div>
                      
                    </div>

                     <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >End Date</label>
                    <input type="date" name="end_date" class="form-control daily" placeholder="DD/MM/YYYY e.g 01/01/2020" value="{{$insurance_policy->end_date}}">
                    <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Policy Number</label>
                        <input type="text" name="po_number" class="form-control" value="{{$insurance_policy->po_number}}" readonly >
                            <div class="form-control-focus"> </div>
                      
                    </div>

                 </div>

                 

                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{Route('insurance_policies.index')}}"><button class="btn btn-danger" type="button">Back</button></a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>


                              
@endsection