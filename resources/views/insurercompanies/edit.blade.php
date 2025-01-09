@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2 style="color:#1AB394;"><strong>Insurer Company Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>Insurer Company</a>
        </li>
        <li class="active">
            <strong>Edit</strong>
        </li>
    </ol>
</div>

</div>

  <div class="wrapper wrapper-content animated fadeInRight">        

<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Edit Insurer Company</h5>
            <div class="ibox-tools">
                <a href="{{Route('home')}}" class="btn btn-danger btn-xs active">Home <i class="fa fa-level-up"></i></a> 
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-insurercompany">
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
          
      
            
            {!! Form::model($insurercompany, ['method' => 'PATCH', 'enctype'=>'multipart/form-data','route' => ['insurercompanies.update', $insurercompany->id]]) !!}

         
                <div class="form-body row">  
                <div class="form-group form-md-line-input col-md-12">
                    <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Name</label>
                    <input type="text" name="name" class="form-control" value="{{$insurercompany->name}}" required="">
                    <div class="form-control-focus"> </div>
                      
                </div>
                <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Contact Name</label>
                    <input type="text" name="contact_name" class="form-control" value="{{$insurercompany->contact_name}}">
                    <div class="form-control-focus"> </div>
                      
                </div>
                <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Primary Number</label>
                    <input type="text" name="primary_phone" class="form-control" value="{{$insurercompany->primary_phone}}" required="">
                    <div class="form-control-focus"> </div>
                      
                </div>
                 <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Email Address</label>
                    <input type="text" name="email" class="form-control" value="{{$insurercompany->email}}">
                    <div class="form-control-focus"> </div>
                      
                </div>
                </div>               
             

                <div class="form-group form-md-line-input col-md-12">
                    <div class="form-group form-md-line-input col-md-3"> 
                    <label class="control-label" >Select Status</label>
                    <select name="status_id"  class="form-control fstdropdown-select" >

                        @foreach($statuses as $status)                            
                        <option value="{{$status->id}}" {{$status->id == $insurercompany->status_id ? 'selected' : ''}}> {{$status->name}} 
                        </option>
                            @endforeach
                    </select>
                         
                    </div>

                    <div class="form-group form-md-line-input col-md-3">
                    
                    <label class="control-label" >Alternate Number</label>
                    <input type="text" name="alternative_phone" class="form-control" value="{{$insurercompany->alternative_phone}}" required="">
                    <div class="form-control-focus"> </div>
                      
                    </div>

                     <div class="form-group form-md-line-input col-md-3">
                    
                        <label class="control-label" >Contact Email Address</label>
                        <input type="text" name="contact_email" class="form-control" value="{{$insurercompany->contact_email}}" >
                            <div class="form-control-focus"> </div>
                      
                </div>
                  <div class="form-group form-md-line-input col-md-3">
                    
                        <label class="control-label" >Contact Address</label>
                        <input type="text" name="company_address" class="form-control" value="{{$insurercompany->company_address}}" >
                            <div class="form-control-focus"> </div>
                      
                </div>
                 </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{Route('insurercompanies.index')}}"><button class="btn btn-danger" type="button">Back</button></a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>


                              
@endsection