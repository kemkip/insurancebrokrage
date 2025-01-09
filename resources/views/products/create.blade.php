@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2 style="color:#1AB394;"><strong>Products Management</strong></h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>Products</a>
        </li>
        <li class="active">
            <strong>Create</strong>
        </li>
    </ol>
</div>

</div>

  <div class="wrapper wrapper-content animated fadeInRight">        

<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Create Products</h5>
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
          
            {!! Form::open(array('route' => 'products.store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data')) !!}


                <div class="form-body row"> 
                    <div class="form-group col-md-12">   
                        <div class="form-md-line-input col-md-6"> 
                             <label class="control-label" >Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            <div class="form-control-focus"> </div>

                        </div>
                        <div class="form-md-line-input col-md-6">                                
                           
                            <label class="control-label" >Insurer Company</label>
                            <select name="insurercompany_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Insurer Company ..</option>
                               
                                    @foreach($insurercompanies as $insurercompany)                            
                                <option value="{{$insurercompany->id}}">{{$insurercompany->name}} </option>
                                @endforeach
                             </select>
                         
                    </div>
                         
                    </div>
                    <div class="form-group col-md-12">  

                    
                    <div class="form-md-line-input col-md-6">                                
                           
                            <label class="control-label" >Product Category</label>
                            <select name="productcategory_id"  class="form-control form-md-line-input fstdropdown-select">
                                <option value="">Select Product Categories ..</option>
                                
                                    @foreach($productcategories as $productcategory)                            
                                <option value="{{$productcategory->id}}">{{$productcategory->name}} </option>
                                @endforeach
                             </select>
                         
                    </div> 
                    <div class="form-md-line-input col-md-6"> 
                             <label class="control-label" >Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Description">
                            <div class="form-control-focus"> </div>

                        </div>
                </div>   
                         
            </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{Route('products.index')}}"><button class="btn btn-danger" type="button">Back</button></a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>


                              
@endsection