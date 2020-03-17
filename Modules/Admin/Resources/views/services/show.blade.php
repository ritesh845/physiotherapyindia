@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Serivce 
					{{link_to('/service', $title = 'Back', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}					
				</h5>
					
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
						<a href="{{url('services_docs/'.$service->id)}}" class="text-primary">Download application form for {{$service->name}}</a>
					</div>

					@role('member')
						<div class="col-md-12 mt-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Attachment Submit</h5>
								</div>
								<div class="card-body">
									{{Form::open(array('url' => '/member_document','method' => 'post' , 'enctype' => 'multipart/form-data'))}}
									<div class="form-group row">
										<div class="col-md-6">
											{{Form::label('file','Attachment Submit here...')}}
											{{Form::file('file',['class' => 'form-control', 'accept' => 'application/pdf,application/*'])}}
											@error('file')
												<span class="text-danger" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
											@enderror
										</div>
									</div>
									<div class="form-group row mt-2">
										<div class="col-md-6">
											{{Form::hidden('service_id',$service->id)}}
											{{Form::submit('Submit',['class' => 'btn btn-sm btn-primary'])}}
										</div>
									</div>
									{{Form::close()}}
								</div>
							</div>
						</div>
					@endrole
				@endif
			</div> 


		</div>
	</div>
</div>
@endsection