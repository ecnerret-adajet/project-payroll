@extends('layouts.app')

@section('content')

<ul class="breadcrumb" style="margin-top: 50px;">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Per Quantity</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Daily Quantity Record <a href="{{url('/perdays/create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Record</a></h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th>Employee Name</th>
                  <th>Quantity Made</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Employee Name</th>
                  <th>Quantity Made</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
           @foreach($perdays as $perday)
                <tr>
                  <td>
                 @foreach($perday->employees as $employee)
<img class="img-responsive img-circle" style="width: 35px; height: auto;" src="{{asset('/avatar/'.$employee->avatar)}}">
                 @endforeach
                  </td>
                  <td>
                  @foreach($perday->employees as $employee)
                  {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} 
                  @endforeach
                  </td>

                  <td>
                  {{$perday->total_quantity}}
                  </td>

                  <td>
                  {{ (date("d/m/Y", strtotime($perday->publish_date)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($perday->publish_date)) )  }}
                  </td>
                 
                </tr>
            @endforeach
              </tbody>
            </table>



  </div>
</div>



@endsection

