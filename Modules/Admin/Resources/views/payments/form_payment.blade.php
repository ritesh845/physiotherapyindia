@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Service Form RECIEPT</h5>
					
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 m-auto">
						<div class="card">
							<div class="card-header">
								<h6 class="card-title font-weight-bold" >
									<img src="{{asset('images/physio.png')}}" style="width: 100px; height: 30px">IAP SERVICE FORM PAYMENT RECIEPT
								</h6>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-4 text-right">
										<p class="">Member Full Name :</p>
									</div>
									<div class="col-md-8">
										<p>{{$member->first_name. ($member->middle_name !=null ? ' '.$member->middle_name : '' )." ". $member->last_name  }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 text-right">
										<p class="">Member Mobile Number:</p>
									</div>
									<div class="col-md-8">
										<p>{{$member->mobile }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 text-right">
										<p class="">Service Name:</p>
									</div>
									<div class="col-md-8">
										<p>{{$service->name }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 text-right">
										<p class="">Service Charges:</p>
									</div>
									<div class="col-md-8">
										<p><i class="fa fa-rupee"></i> {{$service->charges }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 text-right">
										<p class="">Date:</p>
									</div>
									<div class="col-md-8">
										<p>{{date('d-m-Y')}}</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<a href="{{url('service/payment_now/'.$member->id)}}" class="btn btn-sm btn-primary">Pay Now </a>
							</div>
						</div>
						{{-- <h5>{{$service->name}}</h5> --}}
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection