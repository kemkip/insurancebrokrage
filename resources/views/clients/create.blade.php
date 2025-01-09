@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-12">
    <h2 style="color:#1AB394;"><strong>Clients Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>Clients</a>
        </li>
        <li class="active">
            <strong>Create</strong>
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
            <h5>Create Clients</h5>
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
          
            {!! Form::open(array('route' => 'clients.store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}


                <div class="form-body row"> 
                    <div class="form-group col-md-12">   
                        <div class="form-md-line-input col-md-3"> 
                             <label class="control-label" >Name</label>
                                <input type="text" name="name" class="form-control" placeholder="client Name">
                            <div class="form-control-focus"> </div>

                        </div>
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
                    
                        <label class="control-label" >Phone Number</label>
                        <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="primary_phone" class="form-control" placeholder="Phone Number e.g. +254723000000">
                    </div>
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                     <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Email Address</label>
                         <div class="input-group email">
                            <span class="input-group-addon"><i class="fa fa-reply"></i></span>
                        <input type="text" name="email_address" class="form-control" placeholder="Enter Email Address">
                    </div>
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                         
                    </div>
                    <div class="form-group col-md-12">  

                    
                    <div class="form-md-line-input col-md-3">                                
                           
                            <label class="control-label" >Country</label>
                            <div class="input-group country">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <select name="country_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Country ..</option>
                                
                                    @foreach($countries as $country)                            
                                <option value="{{$country->id}}">{{$country->name}} </option>
                                @endforeach
                             </select>
                         </div>
                         
                    </div> 
                    <div class="form-md-line-input col-md-3"> 
                             <label class="control-label" >Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Description">
                            <div class="form-control-focus"> </div>

                        </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Postal Address</label>
                        <input type="text" name="postal_address" class="form-control" placeholder="Address e.g. 12790">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" placeholder="Enter Postal Code e.g. 30100">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                </div>  
                  
                <div class="form-group col-md-12"> 
                     <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >ID Number</label>
                        <input type="text" name="id_number" class="form-control" placeholder="Enter ID Number">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                     <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Alternate Phone Number</label>
                        <input type="text" name="alternative_phone" class="form-control" placeholder="Alternate Phone Number">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >PIN Number</label>
                        <input type="text" name="pin_no" class="form-control" placeholder="PIN Number">
                            <div class="form-control-focus"> </div>
                      
                    </div> 
                     <div class="form-md-line-input col-md-3">
                        <label for="photo" class=" control-label" >Picture</label>
                            
                                <input type="file" id="photo" name="photo">
                                <span class="help-block"> Provide Photo </span>
                            
                    </div>
                </div>
                        
             
                         
            </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{Route('clients.index')}}"><button class="btn btn-danger" type="button">Back</button></a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>


                              
@endsection