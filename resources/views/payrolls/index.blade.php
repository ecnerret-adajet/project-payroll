@extends('layouts.app')

@section('content')

<div class="row">

<h1 class="page-header">Payslips</h1>

<ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('payslips')}}">Payslip</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Payslips <a href="{{url('/payrolls/create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Payslips</a></h3>
  </div>
  <div class="panel-body">
   

 <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
              <thead>
                <tr>
                <th></th>
                  <th>Payroll Number</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Attendance</th>
                  <th>Basic Pay</th>
                  <th>Per Quantity</th>
                  <th>Date Period</th>
                  <th>Action</th>
                </tr>
              </thead>
        
              <tbody>
           @foreach($payrolls as $payroll)
                   <tr>
                  <td>
                      @foreach($payroll->employees  as $employee)
                        <img class="img-responsive img-circle" style="width: 35px; height: auto;" src="{{asset('/avatar/'.$employee->avatar)}}">
                      @endforeach
                  </td>
                  <td> {{$payroll->id}}</td>
                  <td>
                      @foreach($payroll->employees  as $employee)
                      {{$employee->full_name}}
                      @endforeach
                  </td>
                  <td>
                  @foreach($payroll->employees as $employee)

                      @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
                    
                  @endforeach
                  </td>
                  <td>
                  <span style="display: none ! important"> 
                  @foreach($payroll->employees as $employee)
                        @foreach($employee->attendances as $attendance)
                          {{$attendance->time_in}}
                          {{$attendance->id}}
                        @endforeach
                  @endforeach
                  </span>


                       {{  $payroll->start_period->diffInDays($payroll->end_period).' Day(s)' }}

                   
                  </td>
                  <td>
                    @foreach($payroll->employees as $employee)
                        {{ ($employee->salaries->basic_pay == null ? 'Per day basis' : $employee->salaries->basic_pay )}}
                    @endforeach
                  </td>
                  <td>Per Quantity</td>
                  <td>Date Period</td>
                  <td>
                       <a class="btn btn-primary" href="{{url('payrolls/'.$payroll->id)}}">
                  <i class="fa fa-eye " aria-hidden="true"></i>  Details
                  </a>
                  </td>
                </tr>
          @endforeach
              </tbody>
            </table>



  </div>
</div>

</div>


@endsection

