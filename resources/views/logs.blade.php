@extends('layouts.auth')
@section('content')



 


        <div class="panel panel-primary col-md-offset-4 col-md-4"  style="margin-top: 100px; padding: 0 ! important;">
  <div class="panel-heading">
    <h3 class="panel-title text-center">DAILY TIME RECORD</h3>
  </div>
  <div class="panel-body">

      @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif


      <div class="form-group">
<div class="col-md-6">
 <div class="radio">
          <label style="font-size: 15px; margin-left: 45px;">
            <input style="height:20px; width:20px;" type="radio" name="optionsRadios" id="optionsRadios1" value="perquantity" checked="">
            TIME IN
          </label>
        </div>
</div>

      <div class="col-md-6">
       
        <div class="radio">
          <label style="font-size: 15px;">
            <input style="height:20px; width:20px;" type="radio" name="optionsRadios" id="optionsRadios2" value="basicpay">
           TIME OUT
          </label>
        </div>
      </div>
    </div>

    <center>
    <span id='ct' ></span>
    </center>


 {!! Form::model($attendance = new \App\Attendance,  ['class' => 'form-horizontal',  'url' => 'attendances',  'files' => 'true', 'enctype'=>'multipart/form-data', 'novalidate' => 'novalidate', 'id' => 'attendancesForm'])!!}
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('employee_list') ? ' has-error' : '' }}">
 
    <div class="col-md-12">
    {!! Form::select('employee_list', $employees, null, ['class' => 'form-control select2', 'placeholder' => '-- Select Time in --']) !!}

    @if ($errors->has('employee_list'))
    <span class="help-block">
    <strong>{{ $errors->first('employee_list') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="perquantity employee_type  form-group{{ $errors->has('time_in') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('time-in', 'Time In:')  !!}
    </label>
    <div class="col-md-8">
       

 <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                     {!! Form::input('date', 'time_in',  $attendance->time_in, ['class' => 'form-control', 'id' => 'datetimepicker1']) !!}  
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


    @if ($errors->has('time-in'))
    <span class="help-block">
    <strong>{{ $errors->first('time-in') }}</strong>
    </span>
    @endif
    </div>
    </div>

       <div style="display:none" class="basicpay  employee_type  form-group{{ $errors->has('time_out') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('time_out', 'Time Out:')  !!}
    </label>
    <div class="col-md-8">
   {!! Form::input('date', 'time_out', $attendance->time_in, ['class' => 'form-control']) !!}  

    @if ($errors->has('time_out'))
    <span class="help-block">
    <strong>{{ $errors->first('time_out') }}</strong>
    </span>
    @endif
    </div>
    </div>



                 <div class="row">
                    <div class="col-md-12 pull-right">
                   {!! Form::submit('SUBMIT', ['class' => 'btn btn-block btn-primary'])  !!}
                    </div>
                   </div> 

 

    {!! Form::close() !!}






  




  </div>
</div>

	




	



@endsection