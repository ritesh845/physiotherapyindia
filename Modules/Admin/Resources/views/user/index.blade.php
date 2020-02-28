@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Member</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Members <a href="{{url('/member/create')}}" class="btn btn-sm btn-primary pull-right">Add Member</a></h4>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped" id="myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Member Type</th>
							<th>Registration Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($members as $member)
							<tr>
								<td>{{$member->id}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->email}}</td>
								<td>{{$member->mobile}}</td>
								<td>{{$member->member_type}}</td>
								<td>{{date('Y-m-d',strtotime($member->created_at))}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script >
	$(document).ready(function () {
    	$('#myTable').DataTable();
	});
</script>
@endsection
