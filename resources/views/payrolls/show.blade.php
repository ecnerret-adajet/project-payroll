@extends('layouts.app')
@section('content')

<div class="row">

<h1 class="page-header no-print">Payslip</h1>

<ul class="breadcrumb no-print">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#">Payslip</a></li>
  <li><a href="#">Show</a></li>
</ul>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title no-print"><i class="fa fa-file-text-o" aria-hidden="true"></i>  Payslip period </h3>
  </div>
  <div class="panel-body">




<div class="row">
<div class="col-md-12">

  <table class="table table-striped table-bordered table-hover ">
  <tr>
  <td colspan="2" width="25%">
  Company Name:
  </td>
  <td colspan="2" width="75%">
  MRQK
  </td>
  </tr>

    <tr>
  <td colspan="2" width="25%">
 Company address
  </td>
  <td colspan="2" width="75%">
  135 Pio Marulas Valenzuela City
  </td>
  </tr>

      <tr>
  <td colspan="2" width="25%">
Payroll Date:
  </td>
  <td colspan="2" width="75%">

   {{  date('m/d/Y', strtotime($payroll->payroll_date)) == '01/01/1970' ? 'N/A' : date('m/d/Y', strtotime($payroll->payroll_date))  }} 

  </td>
  </tr>

       <tr>
  <td colspan="2" width="25%">
Pay Period
  </td>
  <td colspan="2" width="75%">
  {{  date('m/d/Y', strtotime($payroll->start_period))  }} - {{  date('m/d/Y', strtotime($payroll->end_period))  }} 
  </td>
  </tr>

  <tr>
  <td colspan="2" width="25%">
Employee No:
  </td>
  <td colspan="2" width="75%">
    @foreach($payroll->employees as $employee)
          {{$employee->id}}
        @endforeach   
  </td>
  </tr>

    <tr>
  <td colspan="2" width="25%">
Employee Name:
  </td>
  <td colspan="2" width="75%">
   @foreach($payroll->employees as $employee)
          {{$employee->full_name}}
        @endforeach   
  </td>
  </tr>

  <tr class="success">
  <th colspan="2" class="text-center" width="50%">
EARNINGS
  </th>
  <th colspan="2"  class="text-center" width="50%">
  DEDUCTIONS
  </th>
  </tr>

  <tr>
  <td width="25%">
  Basic Pay
  </td>

 <td width="25%">
  @foreach($payroll->employees as $employee)
          {{ ($employee->salaries->basic_pay == null ? 'Per day basis' : 'PHP '.$employee->salaries->basic_pay.'.00' )}}
  @endforeach



  </td>
    <td width="25%">
    Absent
  </td>
     <td width="25%">
  
            {{ round($absent_deduct = ($payroll->start_period->diffInWeekDays( $payroll->end_period) - $attendances->count()) * $employee->salaries->basic_pay, 0) }}  <br/>

  </td>

  </tr>

   <tr>
   <td width="25%">
  Allowance
  </td>
     <td width="25%">
    @foreach($payroll->employees as $employee)
         PHP {{  round( $allowance = $employee->salaries->meal_allowance + $employee->salaries->transportation , 0)  }}.00
        @endforeach 
  </td>
    <td width="25%">
    Late
  </td>
  
  <td width="25%">
      0
<span style="display: none;">
  {{  $late = ($payroll->start_period->diffInWeekDays( $payroll->end_period) * 9 * 60) - ($total_minutes)}} in minutes <br/>
  {{  (  $attendances->count() <= 0 ? '0' : round($late_deduct = $hourly_rate / 60 * $late, 0)    )}}  <br/>

  </span>

  </td>

  </tr>

   <tr>
 <td width="25%">
 Overtime
  </td>
 <td width="25%">
     <?php
   $overtime_total =  $total_hour - $payroll->start_period->diffInWeekDays( $payroll->end_period) * 9; 
   ?>
  {{ ( $overtime_pay = $overtime_total * $hourly_rate  < 0 ? '0' : $overtime_pay = $overtime_total * $hourly_rate )}} 
 
  </td>
    <td width="25%">
   Undertime
  </td>
    <td width="25%">
    0
    <span style="display: none;">
    <?php
   $undertime_total = ( $payroll->start_period->diffInWeekDays( $payroll->end_period) * 9 ) - $total_hour; 
   ?>
  {{  round($undertime_deduct  = $undertime_total * $hourly_rate,0) }} 
 </span>
  </td>

  </tr>



   <tr>
   <td width="25%">
 Per-day total:
  </td>
  <td width="25%">
      @foreach($payroll->employees as $employee)
               @foreach($employee->basics as $basic)
                    {{  $perday_pay = $total_perday * $basic->salary}}
                  @endforeach

                  @foreach($employee->quantities as $quantity)
                    {{ $perday_pay = $total_perday  * $quantity->salary}}
                  @endforeach
        @endforeach           


  </td>
     <td width="25%">
    SSS Premium
  </td>

  <td width="25%">

      {{ $sss_deduct = (round($sss_deduct2 =(($hourly_rate * 8 * $attendances->count() ) * 0.11 ) * 0.33 , 0 )   < 100 ? '0' : round($sss_deduct =(($hourly_rate * 8 * $attendances->count() ) * 0.11 ) * 0.33 , 0 ) )}} 


  </td>

  </tr>


  <tr>
  <td colspan="2" rowspan="2" width="50%" class="text-center">

  <span style="font-size: 20px;" class="text-center">
  Gross Pay:   {{ round( $gross_pay = $employee->salaries->basic_pay * $attendances->count() + $overtime_pay + $allowance + $perday_pay, 0 )}}
  </span>
  </td>

      <td width="25%">
    Philhealth
  </td>

  <td width="25%">

  {{ $phil_deduct = (round($phil_deduct2 = ( (( $hourly_rate * 8 * $attendances->count() ) * 2 ) * 0.025) / 2 , 0 )  < 100 ? '0' :  round($phil_deduct = ( (( $hourly_rate * 8 * $attendances->count() ) * 2 ) * 0.025) / 2 , 0 )) }} 

  </td>

  </tr>

    <tr>


      <td width="25%">
  HDMF Premium
  </td>
    <td width="25%">
    
  
    {{ $pagibig_deduct = (round($sss_deduct =(($hourly_rate * 8 * $attendances->count() ) * 0.11 ) * 0.33 , 0 )  < 100 ? '0' : 100) }}

  

  </td>

  </tr>

  <tr>
  <td colspan="2" rowspan="2" width="50%" class="text-center"> 
 
<span style="font-size: 20px;" class="text-center">
  Net Pay: 

  <span style="display: none;">
  {{ round($net_pay = ($gross_pay) - ($absent_deduct + $sss_deduct + $phil_deduct + $pagibig_deduct + $payroll->other_deductions) , 0).'.00'   }} <br/>
</span>
 PHP  {{   (round($net_pay, 0) < $gross_pay ? $gross_pay :  round($net_pay, 0)  ) }}.00 
  </span>
  </td>
  
     <td width="25%">
 Others
  </td>
    <td width="25%">
  PHP {{$payroll->other_deductions}}.00 (Remarks: {{ $payroll->remarks }})
  </td>

  </tr>


  <tr>
  
    <td width="25%">
Taxwitheld
  </td>
    <td width="25%">
    0

  </td>

  </tr>

  <tr>
  <td width="25%">
  </td>
  <td width="25%">
  </td>
  <th width="25%">
  Total Deduction
  </th>
  <th width="25%">

   PHP {{ round($total_deduct = $absent_deduct  + $sss_deduct + $phil_deduct + $pagibig_deduct + $payroll->other_deductions , 0).'.00'   }}<br/>
  


  </th>

  </tr>

    <tr>
  <td width="25%">
  </td>
  <td width="25%">
  </td>
  <th width="25%">
  Salary
  </th>
  <th width="25%">
  </th>

  </tr>





  </table>






 
</div>
</div>

<div class="row">
<div class="col-md-12 " >
    <button class="btn btn-primary pull-right no-print" onclick="myFunction()">Print Payslip</button>
</div>
</div>


  



 
</div>
  </div>
</div>






</div>




@endsection