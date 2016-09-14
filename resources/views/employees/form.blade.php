 <ul class="nav nav-tabs">
   <li class="active"><a href="#account" data-toggle="tab" aria-expanded="true"><i class="fa fa-key" aria-hidden="true"></i> Account Information</a></li>
  <li><a href="#personal" data-toggle="tab" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> Personal Information</a></li>
  <li class=""><a href="#contacts" data-toggle="tab" aria-expanded="false"><i class="fa fa-phone" aria-hidden="true"></i> Contacts Information</a></li>
   <li class=""><a href="#job" data-toggle="tab" aria-expanded="false"><i class="fa fa-suitcase" aria-hidden="true"></i> Job Information</a></li> 
 
</ul>

<div id="myTabContent" class="tab-content">

<div class="tab-pane fade active in" id="account">
    <p style="padding-bottom: 10px;">

                         <div class="form-group">
                            <div class=" col-md-5 col-md-offset-3">                                
                            <input name="avatar" type="file" class="filestyle" data-size="sm" data-buttonName="btn-primary" data-buttonBefore="true">
                            </div>
                        </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('name', 'Username:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::text('name', ( isset($employee->user->name) ? $employee->user->name : null ),  ['class' => 'form-control']) !!} 


            

                        @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('email', 'Email:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::text('email', ( isset($employee->user->email) ? $employee->user->email : null ),  ['class' => 'form-control']) !!}     

                        @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('password', 'Password:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::password('password', ['class' => 'form-control']) !!}     

                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                    <div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('confirm-password', 'Confirm password:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}     

                        @if ($errors->has('confirm-password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('confirm-password') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                          <div class="form-group hide">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('roles', 'Roles:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::select('roles[]', $roles, 2,  ['class' => 'form-control','placeholder' => '--- Select a Role ---']) !!}     
                     
                        </div>
                        </div>


                           <div class="row">
                    <div class="col-md-12">
                    <a class="pull-right btnNext btn btn-primary btn-sm" >Next</a>
                    </div>
                   </div>  



    </p>
</div>



  <div class="tab-pane fade active" id="personal">
    <p style="padding-bottom: 10px;">



               


                 


                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('first_name', 'First Name:')  !!}
                        </label>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            {!! Form::input('date', 'birthdate', date($employee->birthdate), ['class' => 'form-control']) !!}         
                         </div>
                         </div>


                             <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('age', 'Age:')  !!}
                        </label>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('address', 'Permanent Address:')  !!}
                        </label>
                        <div class="col-md-4">
                        {!! Form::textarea('address', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('address'))
                        <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>



                             <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('gender', 'Gender:')  !!}
                        </label>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                        {!! Form::text('mobile_no', null,  ['class' => 'form-control', "data-inputmask" => "'mask': '+63999-9999-999'", 'data-mask' ]) !!}     

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
                        <div class="col-md-4">
                        {!! Form::number('telephone', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('telephone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                         


                          <div class="row">
                    <div class="col-md-4">
                     <a class="pull-left btnPrevious btn btn-default btn-sm" >Previous</a>
                    </div>

                    <div class="col-md-4">
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
    <div class="col-md-4">
    {!! Form::select('status_list', $statuses, null, ['class' => 'form-control', 'placeholder' => '-- Select Employee Status --']) !!}

    @if ($errors->has('status_list'))
    <span class="help-block">
    <strong>{{ $errors->first('status_list') }}</strong>
    </span>
    @endif
    </div>
    </div>

      @if(Request::path()== 'employees/'.$employee->id.'/edit')

      @else
    <div class="form-group">
      <label class="col-lg-4 control-label">Employee Type</label>
      <div class="col-lg-6">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="basicpay" checked="">
            Basic Pay Employee
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="perquantity">
            Per Quantitly Employee
          </label>
        </div>
      </div>
    </div>
    @endif

<!--- basic pay method -->
    @if(Request::path()== 'employees/'.$employee->id.'/edit')
      @if($employee->basic_list == null)

      @else
    <div class="basicpay employee_type form-group{{ $errors->has('basic_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('basic_list', 'Position:')  !!}
    </label>
    <div class="col-md-4">

    @if(Request::path()== 'employees/create')
    {!! Form::select('basic_list', ['' => '--- Select position ---'] + $basics, null,  ['class' => 'form-control']) !!}
    @else
    {!! Form::select('basic_list',  $basics, null,  ['class' => 'form-control','placeholder' => '--- Select Position ---']) !!}
    @endif     

    @if ($errors->has('basic_list'))
    <span class="help-block">
    <strong>{{ $errors->first('basic_list') }}</strong>
    </span>
    @endif
    </div>
    </div>
    @endif

    @else
   <div class="basicpay employee_type form-group{{ $errors->has('basic_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('basic_list', 'Position:')  !!}
    </label>
    <div class="col-md-4">

    @if(Request::path()== 'employees/create')
    {!! Form::select('basic_list', ['' => '--- Select position ---'] + $basics, null,  ['class' => 'form-control']) !!}
    @else
    {!! Form::select('basic_list',  $basics, null,  ['class' => 'form-control','placeholder' => '--- Select Position ---']) !!}
    @endif     

    @if ($errors->has('basic_list'))
    <span class="help-block">
    <strong>{{ $errors->first('basic_list') }}</strong>
    </span>
    @endif
    </div>
    </div>
    @endif
   <!--- end basic pay method -->


   <!-- per quantity position -->
     @if(Request::path()== 'employees/'.$employee->id.'/edit')
      @if($employee->quantity_list == null)

      @else

    <div class="perquantity employee_type form-group{{ $errors->has('quantity_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('quantity_list', 'Position:')  !!}
    </label>
    <div class="col-md-4">
    @if(Request::path()== 'employees/create')
    {!! Form::select('quantity_list', ['' => '--- Select position ---'] + $quantities, null,  ['class' => 'form-control']) !!}   
    @else
     {!! Form::select('quantity_list', $quantities, null,  ['class' => 'form-control','placeholder' => '--- Select position ---']) !!}  
    @endif  

    @if ($errors->has('quantity_list'))
    <span class="help-block">
    <strong>{{ $errors->first('quantity_list') }}</strong>
    </span>
    @endif
    </div>
    </div>
    @endif

    @else

       <div class="perquantity employee_type form-group{{ $errors->has('quantity_list') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('quantity_list', 'Position:')  !!}
    </label>
    <div class="col-md-4">
    @if(Request::path()== 'employees/create')
    {!! Form::select('quantity_list', ['' => '--- Select position ---'] + $quantities, null,  ['class' => 'form-control']) !!}   
    @else
     {!! Form::select('quantity_list', $quantities, null,  ['class' => 'form-control','placeholder' => '--- Select position ---']) !!}  
    @endif  

    @if ($errors->has('quantity_list'))
    <span class="help-block">
    <strong>{{ $errors->first('quantity_list') }}</strong>
    </span>
    @endif
    </div>
    </div>


    @endif

<!-- end per quantity position -->
        
     <div class="form-group">
     <label class="col-md-4 control-label"> 
     {!! Form::label('date_hired', 'Date hired:')  !!}
    </label>
    <div class="col-md-4">
        {!! Form::input('date', 'date_hired', $employee->date_hired, ['class' => 'form-control']) !!}         
     </div>
     </div>


    <div class="form-group{{ $errors->has('pagibig_no') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label"> 
    {!! Form::label('pagibig_no', 'Pagibig Num:')  !!}
    </label>
    <div class="col-md-4">
    {!! Form::text('pagibig_no', null,  ['class' => 'form-control', "data-inputmask" => "'mask': '9999-9999-9999'", 'data-mask']) !!}     

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
    <div class="col-md-4">
    {!! Form::text('sss_no', null,  ["class" => "form-control", "data-inputmask" => "'mask': '99-9999999-9'", 'data-mask' ]) !!}     
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
    <div class="col-md-4">
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

    <hr/>
        <div class="perquantity employee_type form-group{{ $errors->has('meal_allowance') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('meal_allowance', 'Meal Allowance:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::text('meal_allowance', ( isset($employee->salaries->meal_allowance) ? $employee->salaries->meal_allowance : null ),  ['class' => 'form-control']) !!}     

                        @if ($errors->has('meal_allowance'))
                        <span class="help-block">
                        <strong>{{ $errors->first('meal_allowance') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                        <div class="perquantity employee_type form-group{{ $errors->has('transportation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('transportation', 'Transportation Allowance:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::text('transportation', ( isset($employee->salaries->transportation) ? $employee->salaries->transportation : null ),  ['class' => 'form-control']) !!}     

                        @if ($errors->has('transportation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('transportation') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                          <div class="basicpay employee_type form-group{{ $errors->has('basic_pay') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('basic_pay', 'Salary:')  !!}
                        </label>
                           <div class="col-md-4">
                        {!! Form::text('basic_pay', ( isset($employee->salaries->basic_pay) ? $employee->salaries->basic_pay : null ),  ['class' => 'form-control']) !!}     

                        @if ($errors->has('basic_pay'))
                        <span class="help-block">
                        <strong>{{ $errors->first('basic_pay') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>
                     




   <div class="row">
                    <div class="col-md-4">
                         <a class="pull-left btnPrevious btn btn-default btn-sm" >Previous</a>
                    </div>

                    <div class="col-md-4 pull-right">
                   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right'])  !!}
                    </div>
                   </div> 
 
    </p>
  </div>



</div>    







                      



  



                        
                        

