@extends('layouts.app')
 
@section('content')


<div class="row">
 
<h1 class="page-header">Create New Role

 </h1>

 <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('roles')}}">Roles</a></li>
  <li class="active"><a href="{{url('roles/create')}}">Create roles</a></li>
</ul>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create role</h3>
  </div>
  <div class="panel-body">
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Display Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                    <label style="margin-right: 20px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->display_name }}</label>
                    
                @endforeach
            </div>
        </div>
        
    </div>

     <div class="row">
                    <div class="col-md-6">
                     <a href="{{ url('/roles') }}" class="btn btn-default">Cancel</a>
                    </div>

                    <div class="col-md-6">
                   {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])  !!}
                    </div>
                   </div> 
    {!! Form::close() !!}
  </div>
</div>

   

</div>

@endsection