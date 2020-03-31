@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Payment Service Form </h5>
					
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<h5>{{$service->name}}</h5>
					</div>
					<div class="col-md-12 form-group">
						{{Form::text('user_name',$member->first_name,['class' => 'form-control','readonly' => 'true'])}}
					</div>
					<div class="col-md-12 form-group">
						{{Form::text('mobile',$member->mobile,['class' => 'form-control','readonly' => 'true'])}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection