                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('title', 'Title:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::text('title', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('title'))
                        <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                  <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label"> 
                        {!! Form::label('body', 'Message:')  !!}
                        </label>
                        <div class="col-md-6">
                        {!! Form::textarea('body', null,  ['class' => 'form-control']) !!}     

                        @if ($errors->has('body'))
                        <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>


                        <div class="form-group">
                         <label class="col-md-4 control-label"> 
                         {!! Form::label('publish_at', 'Publish Date:')  !!}
                        </label>
                        <div class="col-md-6">
                            {!! Form::input('date', 'publish_at', date('Y-m-d'), ['class' => 'form-control']) !!}         
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