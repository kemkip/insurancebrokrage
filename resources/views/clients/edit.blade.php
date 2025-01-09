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
            <strong>Edit</strong>
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
            <h5>Edit Clients</h5>
            <div class="ibox-tools">
                <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-client">
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
          
      
             {!! Form::model($client, ['method' => 'PATCH', 'enctype'=>'multipart/form-data','route' => ['clients.update', $client->id]]) !!}

         
                <div class="form-body row">  
                <div class="form-group form-md-line-input col-md-12">
                    <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Name</label>
                    <input type="text" name="name" class="form-control" value="{{$client->name}}" required="">
                    <div class="form-control-focus"> </div>
                      
                </div>
                <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Status</label>
                    <select name="status_id"  class="form-control fstdropdown-select" >

                        @foreach($statuses as $status)                            
                        <option value="{{$status->id}}" {{$status->id == $client->status_id ? 'selected' : ''}}> {{$status->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>
                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Phone Number</label>
                        <input type="text" name="primary_phone" class="form-control" value="{{$client->primary_phone}}" placeholder="Phone Number e.g. +254723000000" >
                            <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Email Address</label>
                        <input type="text" name="email_address" class="form-control" value="{{$client->email_address}}" placeholder="admin@admin.co.ke" >
                            <div class="form-control-focus"> </div>
                      
                    </div>
                
                </div>               
             

                <div class="form-group form-md-line-input col-md-12">
                    <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Country</label>
                    <select name="country_id"  class="form-control fstdropdown-select" >

                        @foreach($countries as $country)                            
                        <option value="{{$country->id}}" {{$country->id == $client->country_id ? 'selected' : ''}}> {{$country->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>

                    <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Description</label>
                    <input type="text" name="description" class="form-control" value="{{$client->description}}" required="">
                    <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                        <label class="control-label" >Postal Address</label>
                        <input type="text" name="postal_address" class="form-control" value="{{$client->postal_address}}" placeholder="Enter Postal Address e.g. 10100" >
                            <div class="form-control-focus"> </div>
                      
                </div>
                 <div class="form-md-line-input col-md-3">
                        <label class="control-label" >Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="{{$client->postal_code}}" placeholder="Enter Postal Code e.g. 30100" >
                            <div class="form-control-focus"> </div>
                      
                </div>

                 </div>

                 <div class="form-group form-md-line-input col-md-12">
                     <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Alternative Phone Number</label>
                        <input type="text" name="alternative_phone" class="form-control" value="{{$client->alternative_phone}}" placeholder="Alternative Phone Number e.g. +254723000000" >
                            <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >Identity Number</label>
                        <input type="text" name="id_number" class="form-control" value="{{$client->id_number}}" placeholder="34353535" >
                            <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                    
                        <label class="control-label" >PIN Number</label>
                        <input type="text" name="pin_no" class="form-control" value="{{$client->pin_no}}" placeholder="A34353535Y" >
                            <div class="form-control-focus"> </div>
                      
                    </div>

                    <div class="form-md-line-input col-md-3">
                    <label for="photo" class=" control-label" >Picture</label>
                        <img src="{{asset($client->photo)}}" width="50px" height="50px"/>
                            <input type="file" id="photo" name="photo">
                               
                            
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