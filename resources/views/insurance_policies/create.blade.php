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
            <strong>Create</strong>
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
            <h5>Create Insurance Policy</h5>
            <div class="ibox-tools">
                <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
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
          
            {!! Form::open(array('route' => 'insurance_policies.store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}


                <div class="form-body row"> 
                    <div class="form-group col-md-12">   
                        
                        <div class="form-md-line-input col-md-3">                                
                           
                            <label class="control-label" >Status</label>
                            <select name="status_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Status ..</option>
                               
                                    @foreach($statuses as $status)                            
                                <option value="{{$status->id}}">{{$status->name}} </option>
                                @endforeach
                             </select>
                         
                    </div>
                     <div class="form-md-line-input col-md-3">                                
                           
                            <label class="control-label" >Policy Type</label>
                            <select name="policytype_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Policy Type ..</option>
                               
                                    @foreach($policytypes as $policytype)                            
                                <option value="{{$policytype->id}}">{{$policytype->name}} </option>
                                @endforeach
                             </select>
                         
                    </div>
                     <div class="form-md-line-input col-md-3">                                
                           
                            <label class="control-label" >Client</label>
                            <select name="client_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Client ..</option>
                               
                                    @foreach($clients as $client)                            
                                <option value="{{$client->id}}">{{$client->name}} </option>
                                @endforeach
                             </select>
                         
                    </div>
                         
                    </div>
                    <div class="form-group col-md-12">  

                    
                    <div class="form-md-line-input col-md-3">                                
                           
                            <label class="control-label" >Product</label>
                            <div class="input-group country">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <select name="product_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Products ..</option>
                                
                                    @foreach($products as $product)                            
                                <option value="{{$product->id}}">{{$product->name}} </option>
                                @endforeach
                             </select>
                         </div>
                         
                    </div> 
                    <div class="form-md-line-input col-md-3"> 
                             <label class="control-label" >Premium</label>
                                <input type="text" name="premium" class="form-control" placeholder="Insurance Premium">
                            <div class="form-control-focus"> </div>

                        </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Start Date</label>
                        <input type="date" name="start_date" class="form-control daily" placeholder="DD/MM/YYYY e.g 01/01/2020">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >End Date</label>
                        <input type="date" name="end_date" class="form-control daily" placeholder="DD/MM/YYYY e.g 01/01/2020">
                            <div class="form-control-focus"> </div>
                      
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
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
    <!-- </div>
</div>
</div>

</div -->




                              
@endsection