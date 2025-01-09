@extends('layouts.inspinia')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Users</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/home')}}">Home</a>
        </li>
        <li>
            <a>Users</a>
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
            <h5>Create User</h5>
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

            @if (count($errors) > 0)

            <div class="alert alert-danger">


            <ul>

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

            </ul>

            </div>

            @endif 
          
            {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'form-horizontal')) !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10"> 
                        <input type="text" name="first_name" class="form-control"  placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10"> 
                        <input type="text" name="middle_name" class="form-control"  placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10"> 
                        <input type="text" name="last_name" class="form-control"  placeholder="Last Name">
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10"> 
                        <input type="email" name="email" class="form-control"  placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10"> 
                        <input type="text" name="phone_number" class="form-control"  placeholder="+2547XXXXXXXX">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Role</label>

                    <div class="col-sm-10"> 
                         <select  name="role_id" class="form-control" id="form_control_1">
                            <option value="">Select role ..</option>

                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10"> 
                         <select  name="active" class="form-control" id="form_control_1">
                            <option value="">Select Status ..</option>

                                <option value="YES">YES</option>
                                <option value="NO">N0</option>
                        </select>
                    </div>
                </div>


                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="reset">Cancel</button>
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