@role('member_admin|super_admin|admin')
@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Add Serivce 
					{{link_to('/service', $title = 'Back', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}
				</h5>
			</div>
			{{Form::open(array('url' => '/service','method' => 'POST', 'enctype'=> 'multipart/form-data'))}}
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 from-group mt-3">
						{{ Form::label('name', 'Service Name:')}}						
						{{ Form::text('name',old('name'),['class' => 'form-control name'])}}
						@error('name')
	                        <span class="text-danger" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
					</div>

					<div class="col-md-6 from-group mt-3">
						{{ Form::label('charges', 'Service Charges:')}}					
						{{ Form::text('charges',old('charges'),['class' => 'form-control charges','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
							@error('charges')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
					</div>
					<div class="col-md-6 from-group mt-3">
						{{ Form::label('url', 'Url:')}}
						{{ Form::text('url',old('url'),['class' => 'form-control url'])}}
						@error('url')
	                        <span class="text-danger" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror						
					</div>
					<div class="col-md-6 from-group mt-3">
						{{ Form::label('service_type', 'Service Type:')}}
						
						{{ Form::select('service_type',array('' => 'Select Service Type','L' => 'Life Time' , 'S' => 'Short Time'), old('service_type') ,['class'=>'form-control service_type'])}}
						@error('service_type')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror							
					</div>
					{{-- <div class="col-md-6 from-group mt-3">
						{{ Form::label('from', 'Service Start Date:')}}
					
						{{ Form::text('from',old('from') ?? date('Y-m-d'),['class' => 'form-control from'])}}
						@error('from')
	                        <span class="text-danger" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror						
					</div> --}}
					{{-- <div class="col-md-6 from-group mt-3 service_end" style="display: none">
						{{ Form::label('to', 'Service End Date:')}}
						{{ Form::text('to',old('to'),['class' => 'form-control to','placeholder' => date('Y-m-d')])}}
						@error('to')
	                        <span class="text-danger" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
					</div>		 --}}			
					<div class="col-md-12 from-group mt-3">
						{{ Form::label('description', 'Description:')}}
					
						{{ Form::textarea('description',old('description'), ['class'=>'form-control', 'rows' => 2, 'cols' => 40,'id'=>'mytextarea']) }}
						@error('description')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-md-6 from-group mt-3 ">
						{{Form::label('file','Service Document:')}}
						{{ Form::file('file',['class' => 'form-control','accept'=>"application/pdf,application/*"])}}
						@error('file')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>
			</div>
			
			<div class="card-footer">
				{{Form::submit('Submit',['class' => 'btn btn-sm btn-success pull-right'])}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>'
<script> 
	$(document).ready(function(){
		// $(function() {
		//    $('.from, .to').datepicker({
		//    	format:'yyyy-mm-dd'
		//    });
		// });

		// var service_type = "{{old('service_type')}}";
		// serviceChange(service_type);

		// function serviceChange(service_type){
		// 	if(service_type == 'S'){
		// 		$('.service_end').show();
		// 	}else{
		// 		$('.service_end').hide();
		// 		$('.to').val('');
		// 	}
		// } 
		// $('.service_type').on('change',function(e){
		// 	e.preventDefault();
		// 	var service_type = $(this).val();
		// 	serviceChange(service_type);
		// });

	})
</script>
@endsection
@endrole