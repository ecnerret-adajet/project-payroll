 <ul class="nav nav-tabs">
  <li class="active"><a href="#personal" data-toggle="tab" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> Personal Information</a></li>
  <li class=""><a href="#contacts" data-toggle="tab" aria-expanded="false"><i class="fa fa-phone" aria-hidden="true"></i> Contacts Information</a></li>
   <li class=""><a href="#job" data-toggle="tab" aria-expanded="false"><i class="fa fa-suitcase" aria-hidden="true"></i> Job Information</a></li> 
</ul>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="personal">
    <p style="padding-bottom: 10px;">



               


                      <div class="form-group">
                            <div class=" col-md-7 col-md-offset-3">                                
                            <input name="avatar" type="file" class="filestyle" data-size="sm" data-buttonName="btn-primary" data-buttonBefore="true">
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('first_name', 'First Name:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::text('first_name', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('first_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                             <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('middle_name', 'Middle Name:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::text('middle_name', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('middle_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                             <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('last_name', 'Last Name:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::text('last_name', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('last_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>



                             <div class="form-group">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('birthdate', 'Birthdate:')  !!}
                        </label>
                        <div class="col-md-6">
                            {!! Form::input('date', 'birthdate', $employee->birthdate, ['class' => 'form-control']) !!}         
                         </div>
                         </div>


                             <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('age', 'Age:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::number('age', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('age'))
                        <span class="help-block">
                        <strong>{{ $errors->first('age') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                             <div class="form-group{{ $errors->has('civil_status') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('civil_status', 'Civil Status:')  !!}
                        </label>
                        <div class="col-md-6">
                      {{ Form::select('civil_status', array(
                                'Single' => 'Single', 
                                'Married' => 'Married', 
                                'Widowed' => 'Widowed'), 
                                null, array('placeholder' => ' -------- Select Civil Status -------', 'class'=>'form-control' )) }}

                        @if ($errors->has('civil_status'))
                        <span class="help-block">
                        <strong>{{ $errors->first('civil_status') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>



                             <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('gender', 'Gender:')  !!}
                        </label>
                        <div class="col-md-6">
                      {{ Form::select('gender', array(
                                'Male' => 'Male', 
                                'Female' => 'Female', 
                                'Others' => 'Others'), 
                                null, array('placeholder' => ' -------- Select Gender -------', 'class'=>'form-control' )) }}

                        @if ($errors->has('gender'))
                        <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                   <div class="row">
                    <div class="col-md-12">
                    <a class="pull-right btnNext btn btn-primary btn-sm" >Next</a>
                    </div>
                   </div>     

    </p>
  </div>

  <div class="tab-pane fade" id="contacts">
    <p style="padding-bottom: 10px;">
        
                      <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('mobile_no', 'Mobile Number:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::number('mobile_no', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('mobile_no'))
                        <span class="help-block">
                        <strong>{{ $errors->first('mobile_no') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                           <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('telephone', 'Telephone Number:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::number('telephone', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('telephone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                           <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('address', 'Address:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::text('address', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('address'))
                        <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                          <div class="row">
                    <div class="col-md-6">
                     <a class="pull-left btnPrevious btn btn-default btn-sm" >Previous</a>
                    </div>

                    <div class="col-md-6">
                 <a class="pull-right btnNext btn btn-primary btn-sm" >Next</a>
                    </div>
                   </div> 


    </p>
  </div>

    <div class="tab-pane fade" id="job">
    <p style="padding-bottom: 10px">

    <div class="form-group{{ $errors->has('status_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('status_list', 'Employee Status:')  !!} 
    </label>
    <div class="col-md-6">
    {!! Form::select('status_list[]', $statuses, null, ['class' => 'form-control', 'placeholder' => '-- Select Employee Status --']) !!}

    @if ($errors->has('status_list'))
    <span class="help-block">
    <strong>{{ $errors->first('status_list') }}</strong>
    </span>
    @endif
    </div>
    </div>

      <div class="form-group{{ $errors->has('position_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('position_list', 'Position:')  !!}
    </label>
    <div class="col-md-6">
    {!! Form::select('position_list[]', $positions, null,  ['class' => 'form-control', 'placeholder' => '--- Select Position ---']) !!}     

    @if ($errors->has('position_list'))
    <span class="help-block">
    <strong>{{ $errors->first('position_list') }}</strong>
    </span>
    @endif
    </div>
    </div>


        
     <div class="form-group">
     <label class="col-md-4 control-label"> 
     {!! Form::label('date_hired', 'Date:')  !!}
    </label>
    <div class="col-md-6">
        {!! Form::input('date', 'date_hired', $employee->date_hired, ['class' => 'form-control']) !!}         
     </div>
     </div>


    <div class="form-group{{ $errors->has('pagibig_no') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('pagibig_no', 'Pagibig Num:')  !!}
    </label>
    <div class="col-md-6">
    {!! Form::text('pagibig_no', null,  ['class' => 'form-control']) !!}     

    @if ($errors->has('pagibig_no'))
    <span class="help-block">
    <strong>{{ $errors->first('pagibig_no') }}</strong>
    </span>
    @endif
    </div>
    </div>

     <div class="form-group{{ $errors->has('sss_no') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('sss_no', 'SSS Num:')  !!}
    </label>
    <div class="col-md-6">
    {!! Form::text('sss_no', null,  ['class' => 'form-control']) !!}     

    @if ($errors->has('sss_no'))
    <span class="help-block">
    <strong>{{ $errors->first('sss_no') }}</strong>
    </span>
    @endif
    </div>
    </div>

    <div class="form-group{{ $errors->has('salary_type') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('salary_type', 'Salary Type:')  !!}
    </label>
    <div class="col-md-6">
    {{ Form::select('salary_type', array(
        'Weekly' => 'Weekly', 
        'Monthly' => 'Monthly'), 
        null, array('class'=>'form-control' )) }}
    

    @if ($errors->has('salary_type'))
    <span class="help-block">
    <strong>{{ $errors->first('salary_type') }}</strong>
    </span>
    @endif
    </div>
    </div>


     <div class="row">
                    <div class="col-md-6">
                      {!! Form::reset('Cancel', ['class' => 'btn btn-default pull-left']) !!}
                    </div>

                    <div class="col-md-6">
                   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right'])  !!}
                    </div>
                   </div> 
    </p>
  </div>
</div>    







                      



  



                        
                        

