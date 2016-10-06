@extends('layouts.app')
 
@section('content')


<div class="row">

<h1 class="page-header">Users Management

 </h1>

 <ul class="breadcrumb">
  <li><a href="{{url('home')}}">Dashboard</a></li>
  <li><a href="{{url('users')}}">Uses</a></li>
</ul>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Users

    <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New User</a>
<a href="{{ url('/roles')}}" class="btn btn-danger"><i class="fa fa-life-ring" aria-hidden="true"></i> Manage Roles</a>	
    </h3>
  </div>
  <div class="panel-body">
   <table id="emp-data" class="dt-responsive table-bordered nowrap display table-responsive table-hover table table-responsive">
   <thead>
   	<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>

   </thead>

   <tbody>
   	
@foreach ($data as $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
		</td>
	</tr>
	@endforeach

   </tbody>
	
	</table>
  </div>
</div>

	


</div>


@endsection