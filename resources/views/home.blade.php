@extends('layouts.inspinia')

@section('content')

<div class="wrapper wrapper-content">  
    <h3 class="page-title" style="color:#1AB394"><strong class="text-uppercase">Welcome</strong>
                <small class="small text-titlecase">{{Auth::User()->first_name}} {{Auth::User()->middle_name}} {{Auth::User()->last_name}} </small>
            </h3>               

<div class="row">
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Users</span>
                <h5>Users</h5>
            </div>
            <div class="ibox-content">
                <h3 class="no-margins">{{$user->users_count()}}</h3>
                <div class="stat-percent font-bold text-success">{{$user->users_count()}}<i class="fa fa-bolt"></i></div>
                <a href="{{Route('users.index')}}"><small>Users</small></a>
            </div>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Insurer Companies</span>
                <h5>Insurer Companies</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$insurercompany->insurercompanies_count()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$insurercompany->insurercompanies_count()}} <i class="fa fa-level-up"></i></div>
                <a href="{{Route('insurercompanies.index')}}"><small>Insurer Companies</small></a>
            </div>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Clients</span>
                <h5>Clients</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$client->clients_count()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$client->clients_count()}} <i class="fa fa-level-up"></i></div>
                <a href="{{Route('clients.index')}}"><small>Clients</small></a>
            </div>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Products</span>
                <h5>Products</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$product->products_count()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$product->products_count()}} <i class="fa fa-level-up"></i></div>
                <a href="{{Route('products.index')}}"><small>Product</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Active Clients</span>
                <h5>Active Clients</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$client->active_clients()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$client->active_clients()}} <i class="fa fa-level-up"></i></div>
                <a href="{{url('open-clients')}}"><small>Active Clients</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Closed Clients</span>
                <h5>Closed Clients</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$client->inactive_clients()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$client->inactive_clients()}} <i class="fa fa-level-up"></i></div>
                <a href="{{url('closed-clients')}}"><small>Closed Clients</small></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Policies</span>
                <h5>Policies</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$insurance_policy->insurance_policies_count()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$insurance_policy->insurance_policies_count()}} <i class="fa fa-level-up"></i></div>
                <a href="{{Route('insurance_policies.index')}}"><small>Policies</small></a>
            </div>
        </div>
    </div>

     <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Active Policies</span>
                <h5>Active Policies</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$insurance_policy->active_insurance_policies()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$insurance_policy->active_insurance_policies()}} <i class="fa fa-level-up"></i></div>
                <a href="{{url('active-policies')}}"><small>Active Policies</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Inactive Policies</span>
                <h5>Inactive Policies</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$insurance_policy->inactive_insurance_policies()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$insurance_policy->inactive_insurance_policies()}} <i class="fa fa-level-up"></i></div>
                <a href="{{url('inactive-policies')}}"><small>Inactive Policies</small></a>
            </div>
        </div>
    </div>

      <div class="col-lg-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Expired Policies</span>
                <h5>Expired Policies</h5>
            </div>
            <div class="ibox-content">
                <h4 class="no-margins">{{$insurance_policy->expired_insurance_policies()}}</h4>
                <div class="stat-percent font-bold text-info"> {{$insurance_policy->expired_insurance_policies()}} <i class="fa fa-level-up"></i></div>
                <a href="{{url('expired-policies')}}"><small>Expired Policies</small></a>
            </div>
        </div>
    </div>

</div>
<!-- <div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div>
                                <span class="pull-right text-right">
                                <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                    <br/>
                                    All sales: 162,862
                                </span>
                    <h3 class="font-bold no-margins">
                        Half-year revenue margin
                    </h3>
                    <small>Sales marketing.</small>
                </div>

                <div class="m-t-sm">

                    <div class="row">
                        <div class="col-md-8">
                            <div>
                                <canvas id="lineChart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="stat-list m-t-lg">
                                <li>
                                    <h2 class="no-margins">2,346</h2>
                                    <small>Total orders in period</small>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 48%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">4,422</h2>
                                    <small>Orders in last month</small>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 60%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="m-t-md">
                    <small class="pull-right">
                        <i class="fa fa-clock-o"> </i>
                        Update on 16.07.2015
                    </small>
                    <small>
                        <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                    </small>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning pull-right">Data has changed</span>
                <h5>User activity</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-xs-4">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>236 321.80</h4>
                    </div>

                    <div class="col-xs-4">
                        <small class="stats-label">% New Visits</small>
                        <h4>46.11%</h4>
                    </div>
                    <div class="col-xs-4">
                        <small class="stats-label">Last week</small>
                        <h4>432.021</h4>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-xs-4">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>643 321.10</h4>
                    </div>

                    <div class="col-xs-4">
                        <small class="stats-label">% New Visits</small>
                        <h4>92.43%</h4>
                    </div>
                    <div class="col-xs-4">
                        <small class="stats-label">Last week</small>
                        <h4>564.554</h4>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-xs-4">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>436 547.20</h4>
                    </div>

                    <div class="col-xs-4">
                        <small class="stats-label">% New Visits</small>
                        <h4>150.23%</h4>
                    </div>
                    <div class="col-xs-4">
                        <small class="stats-label">Last week</small>
                        <h4>124.990</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> -->

<!-- <div class="row">

<div class="col-lg-12">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Custom responsive table </h5>
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
    <div class="row">
        <div class="col-sm-9 m-b-xs">
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Day </label>
                <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week </label>
                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>

                <th>#</th>
                <th>Project </th>
                <th>Name </th>
                <th>Phone </th>
                <th>Company </th>
                <th>Completed </th>
                <th>Task</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Project <small>This is example of project</small></td>
                <td>Patrick Smith</td>
                <td>0800 051213</td>
                <td>Inceptos Hymenaeos Ltd</td>
                <td><span class="pie">0.52/1.561</span></td>
                <td>20%</td>
                <td>Jul 14, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Alpha project</td>
                <td>Alice Jackson</td>
                <td>0500 780909</td>
                <td>Nec Euismod In Company</td>
                <td><span class="pie">6,9</span></td>
                <td>40%</td>
                <td>Jul 16, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Betha project</td>
                <td>John Smith</td>
                <td>0800 1111</td>
                <td>Erat Volutpat</td>
                <td><span class="pie">3,1</span></td>
                <td>75%</td>
                <td>Jul 18, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Gamma project</td>
                <td>Anna Jordan</td>
                <td>(016977) 0648</td>
                <td>Tellus Ltd</td>
                <td><span class="pie">4,9</span></td>
                <td>18%</td>
                <td>Jul 22, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Alpha project</td>
                <td>Alice Jackson</td>
                <td>0500 780909</td>
                <td>Nec Euismod In Company</td>
                <td><span class="pie">6,9</span></td>
                <td>40%</td>
                <td>Jul 16, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Project <small>This is example of project</small></td>
                <td>Patrick Smith</td>
                <td>0800 051213</td>
                <td>Inceptos Hymenaeos Ltd</td>
                <td><span class="pie">0.52/1.561</span></td>
                <td>20%</td>
                <td>Jul 14, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Gamma project</td>
                <td>Anna Jordan</td>
                <td>(016977) 0648</td>
                <td>Tellus Ltd</td>
                <td><span class="pie">4,9</span></td>
                <td>18%</td>
                <td>Jul 22, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Project <small>This is example of project</small></td>
                <td>Patrick Smith</td>
                <td>0800 051213</td>
                <td>Inceptos Hymenaeos Ltd</td>
                <td><span class="pie">0.52/1.561</span></td>
                <td>20%</td>
                <td>Jul 14, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Alpha project</td>
                <td>Alice Jackson</td>
                <td>0500 780909</td>
                <td>Nec Euismod In Company</td>
                <td><span class="pie">6,9</span></td>
                <td>40%</td>
                <td>Jul 16, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Betha project</td>
                <td>John Smith</td>
                <td>0800 1111</td>
                <td>Erat Volutpat</td>
                <td><span class="pie">3,1</span></td>
                <td>75%</td>
                <td>Jul 18, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Gamma project</td>
                <td>Anna Jordan</td>
                <td>(016977) 0648</td>
                <td>Tellus Ltd</td>
                <td><span class="pie">4,9</span></td>
                <td>18%</td>
                <td>Jul 22, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Alpha project</td>
                <td>Alice Jackson</td>
                <td>0500 780909</td>
                <td>Nec Euismod In Company</td>
                <td><span class="pie">6,9</span></td>
                <td>40%</td>
                <td>Jul 16, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Project <small>This is example of project</small></td>
                <td>Patrick Smith</td>
                <td>0800 051213</td>
                <td>Inceptos Hymenaeos Ltd</td>
                <td><span class="pie">0.52/1.561</span></td>
                <td>20%</td>
                <td>Jul 14, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Gamma project</td>
                <td>Anna Jordan</td>
                <td>(016977) 0648</td>
                <td>Tellus Ltd</td>
                <td><span class="pie">4,9</span></td>
                <td>18%</td>
                <td>Jul 22, 2013</td>
                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>

</div> -->


</div>
@endsection
