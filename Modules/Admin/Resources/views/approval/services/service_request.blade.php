@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Member Service Requests</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"></h4>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Service Name</th>
							<th>Member Full Name</th>
							<th>Mobile</th>
							<th>Payment Verification</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $count = 0 ;@endphp
						@foreach($services as $service)
						<tr>
							<th>{{++$count}}</th>
							<th>{{$service->service->name}}</th>
							<th>
								{{$service->member->first_name. ($service->member->middle_name !=null ? ' '.$service->member->middle_name : '' )." ". $service->member->last_name  }}
							</th>
							<th>{{$service->member->mobile}}</th>
							<th>
								@if($service->payment_id == '')
									{{__('Payment Pending')}}
								@else
									{{__('Payment Done')}}
								@endif
							</th>
							<th>
								<a href=""><i class="fa fa-eye btn btn-sm btn-primary"></i></a>
							</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>
@endsection