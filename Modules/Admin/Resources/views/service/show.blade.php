@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Serivce <a href="{{url('/admin/service')}}" class="btn btn-sm btn-primary pull-right">Back</a></h5>
			</div>
			<div class="card-body">
				<div class="col-md-10">
					<h4 class="font-weight-bold text-capitalize">{{$service->name}}</h4>
					<p class="font-weight-bold">Service Start Date: {{date('d-m-Y',strtotime($service->from))}} @if($service->service_type == 'S')<span class="font-weight-bold pull-right text-right">Service End Date: {{date('d-m-Y',strtotime($service->from))}}</span> @endif</p>
					<h6 class="font-weight-bold">Service Charges <i class="fa fa-rupee"></i>{{$service->charges}}</h6>
				</div>
				<div class="col-md-12">
					<p>@php
						echo $service->description;
					@endphp</p>
				</div>
				@if($service->doc_url !=null)
					<div class="col-md-12 mt-4">
						<h4 class="font-weight-bold">Attachments</h4>
						<a href="{{url('admin/services_docs/'.$service->id)}}" class="text-primary">Download application form for {{$service->name}}</a>
					</div>
				@endif
			</div> 
		</div>
	</div>
</div>
@endsection