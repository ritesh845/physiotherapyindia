@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Topics</h1>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-white">
				<h5 class="card-title">Show Topics</h5>
			</div>
			<div class="card-body">
				
			</div>
		</div>
	</div>

    <div class="col-md-8">
        <div class="card">
        	<div class="card-header">
        		<h5 class="card-title">Add New Topic
        			@include('category::partials.buttonDropdown')
        		</h5>
        	</div>
        	<div class="card-body">
        		{{Form::open(array('url'=>'','method'=>'post'))}}
        			<div class="from-group row mb-4">
						{{ Form::label('name', 'Topic Name:',['class'=>'col-md-4 text-right'])}}
						<div class="col-md-8 ">
							{{ Form::text('name',old('name'),['class' => 'form-control name'])}}
							@error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
					</div>

					<a href="javascript:void(0)" class="text-arimary advance"><i class="fa fa-arrow-up arrow"></i> <b>Advanced Options</b></a>
					<hr>
					<div class="advanced_form">
						<div class="from-group row mb-4">
							{{ Form::label('url', 'Topic url:',['class'=>'col-md-4 text-right'])}}
							<div class="col-md-8 ">
								{{ Form::text('url',old('url'),['class' => 'form-control url'])}}
								@error('url')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
							</div>
						</div>						
					</div>
        		{{Form::close()}}
        	</div>
        		
        </div>
    </div>
</div>
<script >
	$(document).ready(function(){
		$('.advance').on('click',function(){
			$('.arrow').toggleClass("fa-arrow-up fa-arrow-down");
			$('.advanced_form').toggle();
		});

	});
	
</script>
@endsection