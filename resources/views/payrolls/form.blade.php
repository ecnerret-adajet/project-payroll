
   					      <div class="row">
                 

                   	<div class="form-group col-md-12">
                         <label class="col-md-3 control-label"> 
                         {!! Form::label('start_period', 'Start Period:')  !!}
                        </label>
                        <div class="col-md-3">
                            {!! Form::input('date', 'start_period', $payroll->start_period, ['class' => 'form-control']) !!}         
                         </div>
                         

                     
                         <label class="col-md-2 control-label"> 
                         {!! Form::label('end_period', 'End Period:')  !!}
                        </label>
                        <div class="col-md-3">
                            {!! Form::input('date', 'end_period', $payroll->end_period, ['class' => 'form-control']) !!}         
                         </div>
                         </div>

                  

                  </div>

                  <hr style="padding-top: 0 ! important; margin-top: 0 ! important;" />


                   <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive" style="width:100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Attendance</th>
                  <th>Late</th>
                  <th>Meal</th>
                  <th>Transpo</th>
                  <th>Total dozen</th>
                  <th>Basic Pay</th>
                  <th>Net Gross</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Attendance</th>
                  <th>Late</th>
                  <th>Meal</th>
                  <th>Transpo</th>
                  <th>Total dozen</th>
                  <th>Basic Pay</th>
                  <th>Net Gross</th>
                </tr>
              </tfoot>
              <tbody>
           @foreach($employees as $employee)
                <tr>
               	  <td>{{$employee->full_name}}</td>
                  <td>
                  	 @foreach($employee->basics as $basic)
                    {{$basic->position}}
                  @endforeach
                  @foreach($employee->quantities as $quantity)
                    {{$quantity->position}}
                  @endforeach
                  </td>
                  <td>0</td>
                  <td>0</td>

                  <td>
                  {{ ($employee->salaries->meal_allowance == null ? 'N/A' : $employee->salaries->meal_allowance )}}
                  </td>

                  <td>
                 	{{ ($employee->salaries->transportation == null ? 'N/A' : $employee->salaries->transportation )}}

                  </td>

                  <td>
                    @if ($employee->salaries->basic_pay == '')
                  {!! Form::text('dozen', null,  ['class' => 'form-control', 'id'=>'shares', 'style' => 'width: 100px']) !!}   
                    @else
                    N/A
                    @endif
                    <span id=""> 
                 @foreach($employee->quantities as $quantity)
                    {{$quantity->salary}}
                  @endforeach
                  </span>
                  </td>

                  

                  <td>{{ $employee->salaries->basic_pay}}</td>
                  <td>{!! Form::text('gross_net', null,  ['class' => 'form-control', 'style' => 'width: 100px','id'=>'result']) !!}  </td>
                </tr>
          @endforeach      
              </tbody>
            </table>

    <hr/>

   <div class="row">
                    <div class="col-md-4">
                       <a href="{{ URL::previous() }}" class="btn btn-danger"> Cancel</a>
                    </div>

                    <div class="col-md-4 pull-right">
                   {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right'])  !!}
                    </div>
                   </div> 