@extends('layouts.app')
 
@section('content')
<h1 class="page-header">Users Management
<a href="{{ route('users.create') }}" class="btn pull-right btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New User</a>
<a href="{{ url('/roles')}}" class="btn pull-right btn-danger btn-sm"><i class="fa fa-life-ring" aria-hidden="true"></i> Manage Roles</a>
 </h1>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
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
	</table>
	{!! $data->render() !!}
@endsection