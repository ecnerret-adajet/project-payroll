@extends('layouts.app')
 
@section('content')

<div class="row">


 <h1 class="page-header">Role Management
 @permission('role-create')

@endpermission
 </h1>

  <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('roles')}}">Roles</a></li>
</ul>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">All Roles
<a href="{{url('/roles/create')}}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Role</a>
    </h3>
  </div>
  <div class="panel-body">
  <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
  <thead>
  	<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>

  	 </thead>

  	 <tbody>
  	 	@foreach ($roles as $role)
	<tr>
		<td>{{ $role->id }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
			@permission('role-edit')
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	
  	 </tbody>
		</table>
	
  </div>
</div>

	


</div><!-- end row  -->



@endsection