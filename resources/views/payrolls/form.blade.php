

   					
              


                  <div class="row">
               <div class="col-md-12">
 

                    <div class="form-group">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('start_period', 'Start Period:')  !!}
                        </label>
                        <div class="col-md-5">
                            {!! Form::input('date', 'start_period', $payroll->start_period, ['class' => 'form-control']) !!}         
                         </div>
                     </div>     

                      <div class="form-group">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('end_period', 'End Period:')  !!}
                        </label>
                        <div class="col-md-5">
                            {!! Form::input('date', 'end_period', $payroll->end_period, ['class' => 'form-control']) !!}         
                         </div>
                         </div>

<hr/>
                        <div class="form-group">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('payroll_date', 'Payroll Date:')  !!}
                        </label>
                        <div class="col-md-5">
                            {!! Form::input('date', 'payroll_date', $payroll->payroll_date, ['class' => 'form-control']) !!}         
                         </div>
                         </div>


                   

                          <div class="form-group{{ $errors->has('employee_list') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label"> 
                            {!! Form::label('employee_list', 'Employee:')  !!} 
                            </label>
                            <div class="col-md-5">
                            {!! Form::select('employee_list', $employees, null, ['class' => 'select2 form-control', 'placeholder' => '-- Select Employee --']) !!}

                            @if ($errors->has('employee_list'))
                            <span class="help-block">
                            <strong>{{ $errors->first('employee_list') }}</strong>
                            </span>
                            @endif
                            </div>
                            </div>

                        
                        <div class="form-group {{ $errors->has('other_deductions') ? ' has-error' : '' }}">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('other_deductions', 'Other deductions:')  !!}
                        </label>
                        <div class="col-md-5">
                            {!! Form::number('other_deductions', null, ['class' => 'form-control']) !!}      

                             @if ($errors->has('other_deductions'))
                            <span class="help-block">
                            <strong>{{ $errors->first('other_deductions') }}</strong>
                            </span>
                            @endif   
                         </div>
                     </div>     

                     <div class="form-group {{ $errors->has('remakrs') ? 'has-error' : '' }}">
                     <label class="col-md-4 control-label">
                       {!!   Form::label('remarks', 'Remarks') !!}
                     </label>
                     <div class="col-md-5">
                        {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}

                        @if($errors->has('remarks'))
                        <span class="help-block">
                          <strong>
                            {{ $errors->first('remarks') }}
                          </strong>
                        </span>
                        @endif
                     </div>
                     </div>

                   

                   
                  </div>
                  </div>



       

                 <div class="row ">
                    <div class="col-md-6">
                                            <a href="{{ URL::previous() }}" style="margin-right: 10px;" class="btn btn-block btn-default"> Cancel</a>
                   

                  
                    </div>

                    <div class="col-md-6">
                          {!! Form::submit($submitButtonText, ['class' => 'btn btn-block btn-primary '])  !!}

                    </div>
                   </div> 