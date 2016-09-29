  <div class="form-group{{ $errors->has('employee_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('employee_list', 'Employee:')  !!}
    </label>
    <div class="col-md-4">
    {!! Form::select('employee_list[]',  $employees, null,  ['class' => 'select2 form-control', 'placeholder' => 'Select an employee']) !!}     

    @if ($errors->has('employee_list'))
    <span class="help-block">
    <strong>{{ $errors->first('employee_list') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="form-group{{ $errors->has('total_quantity') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('total_quantity', 'Total Quantity:')  !!}
    </label>
    <div class="col-md-4">
    {!! Form::number('total_quantity', null,  ['class' => 'form-control']) !!}     

    @if ($errors->has('total_quantity'))
    <span class="help-block">
    <strong>{{ $errors->first('total_quantity') }}</strong>
    </span>
    @endif
    </div>
    </div>


    <div class="form-group">
     <label class="col-md-4 control-label"> 
     {!! Form::label('publish_date', 'Publish Date:')  !!}
    </label>
    <div class="col-md-4">
        {!! Form::input('date', 'publish_date', date('Y-m-d'), ['class' => 'form-control']) !!}         
     </div>
     </div>


 
<hr/>

                  <div class="row">
                    <div class="col-md-4">
                       <a href="{{ URL::previous() }}" class="btn btn-danger"> Cancel</a>
                    </div>

                    <div class="col-md-4 pull-right">
                   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right'])  !!}
                    </div>
                   </div> 