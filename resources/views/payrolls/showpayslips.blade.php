@extends('layouts.app')
@section('content')

<div class="row">

 <h1 class="page-header">My Information</h1>
<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Payslip</a></li>
  <li><a href="#">Show</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i>  Payslip period <span style="padding: 10px;background-color: #3498db;" > {{ (date("d/m/Y", strtotime($payroll->start_period)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($payroll->start_period)) )  }} - {{ (date("d/m/Y", strtotime($payroll->end_period)) == '01/01/1970' ? 'N/A' : date("d/m/Y", strtotime($payroll->end_period)) )  }} </span>  </h3>
  </div>
  <div class="panel-body">


  <ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Basic Pay</a></li>
  <li><a href="#profile" data-toggle="tab">Per Quantity</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
    <p style="padding: 10px;">


      <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive" >
              <thead>
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Basic Pay</th>
                  <th>SSS</th>
                  <th>Pag-ibig</th>
                  <th>Attendance</th>
                  <th>Late</th>
                  <th>Other Deductions</th>
                  <th>Subtotal</th>
                  <th>Net Gross</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Basic Pay</th>
                  <th>SSS</th>
                  <th>Pag-ibig</th>
                  <th>Attendance</th>
                  <th>Late</th>
                  <th>Other Deductions</th>
                  <th>Subtotal</th>
                  <th>Net Gross</th>
                </tr>
              </tfoot>
              <tbody>

           @foreach($payroll->employees as $employee)
                 <tr>
                  <td>
                      <img class="img-responsive img-circle" style="width: 35px; height: auto;" src="{{asset('/avatar/'.$employee->avatar)}}">
                  </td>
                  <td>{{$employee->id}}</td>
                  <td>
                      {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} 
                  </td>
                  <td>
                     @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
                  </td>
                  <td>
                    {{$employee->salaries->basic_pay}}
                  </td>
                  <td>SSS</td>
                  <td>Pag-ibig</td>
                  <td></td>
                  <td>Late</td>
                  <td>Other Deductions</td>
                  <td>Subtotal</td>
                  <td>Net Gross</td>
                </tr>
          @endforeach
              </tbody>
            </table>
   
      

    </p>
  </div>
  <div class="tab-pane fade" id="profile">
    <p style="padding:10px;">
      

    </p>
  </div>
 
</div>

 

    





  </div>
</div>




</div>





@endsection