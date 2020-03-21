@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Qualification Approval</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Member List 
					
				</h5>
			</div>
			<div class="card-body">	
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>IAP Number</th>
							<th>Pending Qualifications for approval</th>
						</tr>
					</thead>
					<tbody>
						@php $count = 0 ;@endphp
						@foreach($members as $member)
							<tr>
								<td>{{++$count}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->email}}</td>
								<td>{{$member->mobile}}</td>
								<td>{{$member->iap_no}}</td>
								<td>
									<a href="{{url('approval/qualification/'.$member->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Show</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection