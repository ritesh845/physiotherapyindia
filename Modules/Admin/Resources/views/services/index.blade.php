@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Serivces 
					@role('super_admin') 
						{{link_to('/service/create', $title = 'Add Service', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}
					@endrole
					{{-- @role('member')
						{{link_to('',$title = 'Service Allocate', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'])}}
					@endrole --}}
				</h5>
			</div>
			<div class="card-body">
				@if($message = Session::get('success'))
				    <div class="alert alert-success">
				        {{$message}}
				    </div>
				@endif
				<table class="table table-bordred table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Charges</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($services as $service)
						<tr>
							<td>{{$service->id}}</td>
							<td>{{$service->name}}</td>							
							<td><i class="fa fa-rupee"></i> {{$service->charges != null ? $service->charges : '0' }}</td>
							<td>
								@role('super_admin|admin')
									<a href="{{url('/service/'.$service->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
									<a href="{{url('/service/destroy/'.$service->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash "></i></a>
								@endrole
								@if(count($userServices) !='0')
									@foreach($userServices as $userService)
										@if($userService->service_id == $service->id)
											@if($userService->payment_id == null)
												{{__('Pending For Payment')}}
												<br>
												<a href="{{url('service/payment/'.$userService->user_id)}}" class="btn btn-sm btn-primary">Payment Now</a>
											@endif
												<a href="{{url('service/'.$service->form_name.'_edit/'.$userService->user_id)}}" class="btn btn-sm btn-primary">Show</a>
										@else
											<a href="{{url('/service/'.$service->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
										@endif
									@endforeach
								@else
									<a href="{{url('/service/'.$service->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>	
								@endif
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