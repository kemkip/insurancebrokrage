@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>SMS</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>SMS</a>
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
            <h5>Create SMS</h5>
            <div class="ibox-tools">
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
          
            {!! Form::open(array('route' => 'smses.store','method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-group"><label class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10"> <input type="text" name="first_name" class="form-control"  placeholder="Enter First Name"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10"> <input type="text" name="last_name" class="form-control"  placeholder="Enter Last Name"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10"> <input type="text" name="phone_number" class="form-control"  placeholder="Enter Phone Number"></div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Contribution Amount</label>
                    <div class="col-sm-10"> <input type="text" name="contribution_amount" class="form-control"  placeholder="Enter Contribution Amount"></div>
                </div>
              
              

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <a href="{{Route('smses.index')}}"><button class="btn btn-white" type="button">Cancel</button></a>
                        <button class="btn btn-primary" type="submit">Save changes</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>


                              
@endsection