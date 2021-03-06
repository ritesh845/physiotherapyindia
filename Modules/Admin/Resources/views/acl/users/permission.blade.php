@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">User</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Users <a href="{{url('acl/user')}}" class="btn btn-sm btn-primary pull-right">Back</a></h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 mb-3">
						<h5 class="">User Name:- {{$user->name}}</h5>
					</div>
					{{Form::open(array('url' => '/acl/user/role_assign', 'method' => 'post'))}}

						@csrf
						<div class="col-md-12 form-group">
							@foreach($permissions as $permission)
								{{Form::checkbox('permissions[]',$permission->id, in_array($permission->id,$user->permissions->pluck('id')->toArray()) ? true : null )}} {{$permission->display_name}}
								<br>
							@endforeach	
						</div>
						<div class="col-md-12 mt-4">
							{{Form::hidden('user_id',$user->id)}}
							{{Form::submit('Submit',['class' => 'btn btn-sm btn-success'])}}							
						</div>
					{{Form::close()}}			
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	@if($message = Session::get('success'))
    	alert('{{$message}}');
	@endif
</script>
@endsection