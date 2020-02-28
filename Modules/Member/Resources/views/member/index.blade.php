@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3"><!--left col-->   
					  	<div class="text-center">
					        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail mb-2" alt="avatar" width="150" height="150">
					        <h6>Upload a different photo...</h6>
					        {{ Form::file('image',['class' => 'form-control','style' => 'padding:0px !important'])}}
					        {{-- <input type="file" class="text-center center-block file-upload form-control"> --}}
					    </div><hr><br>
					    <div class="card">
					        <div class="card-header">Website <i class="fa fa-link fa-1x"></i></div>
					        <div class="card-body"><a href=""></a></div>
					    </div>
					    <div class="card">
					        <div class="card-header">Website <i class="fa fa-link fa-1x"></i></div>
					        <div class="card-body"><a href=""></a></div>
					    </div>
					    <ul class="list-group mt-2">
				            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
				            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
				            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
				            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
				            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
				        </ul> 
					</div>
					<div class="col-sm-9 p-3">
						{{ Form::open(array('url' => 'member/'.$member->id,'method' => 'post')) }}
						@method('patch');
						<div class="row">
							<div class="col-md-12 from-group">
								<a href="javascript:void(0)" class="btn btn-sm btn-success pull-right editBtn">Edit</a>
							  	<a href="javascript:void(0)" class="btn btn-secondary btn-sm pull-right cancelBtn" style="display: none">Cancel</a>
							  	{{Form::submit('Update',['class' => 'btn btn-sm btn-success pull-right updateBtn mr-3','style'=>'display:none'])}}

							</div>
						</div>

						<div class="row">
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('name', 'Name:')}}
								{{ Form::text('name',old('name') ?? $member->name,['class' => 'form-control name readonly','readonly'=>'true'])}}
								@error('name')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('email', 'Email Address:')}}
								{{ Form::text('email',old('email') ?? $member->email,['class' => 'form-control email readonly','readonly'=>'true'])}}
								@error('email')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('mobile', 'Mobile Number:')}}
								{{ Form::text('mobile',old('mobile') ?? $member->mobile,['class' => 'form-control mobile readonly','readonly'=>'true','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('mobile')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('mobile1', 'Alternate Mobile Number:')}}
								{{ Form::text('mobile1',old('mobile1') ?? $member->mobile1,['class' => 'form-control mobile1 readonly','readonly'=>'true', 'oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('mobile1')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('iap_no', 'IAP Number:')}}
								{{ Form::text('iap_no',old('iap_no') ?? $member->iap_no,['class' => 'form-control iap_no readonly','readonly'=>'true'])}}
								@error('iap_no')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('clinic_name', 'Clinic Name:')}}
								{{ Form::text('clinic_name',old('clinic_name') ?? $member->clinic_name,['class' => 'form-control clinic_name readonly','readonly'=>'true'])}}
								@error('clinic_name')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('country_code', 'Country Name:')}}
								{{ Form::select('country_code',array('L' => 'Life Time', 'S' => 'Short Time'), '',['class'=>'form-control country_code readonly','readonly'=>'true'])}}	
								@error('country_code')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>	
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('state_code', 'State Name:')}}
								{{ Form::select('state_code',array('L' => 'Life Time', 'S' => 'Short Time'), '',['class'=>'form-control state_code readonly','readonly'=>'true'])}}
								@error('state_code')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror	
							</div>	
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('city_code', 'City Name:')}}
								{{ Form::select('city_code',array('L' => 'Life Time', 'S' => 'Short Time'), '',['class'=>'form-control city_code readonly','readonly'=>'true'])}}
								@error('city_code')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror	
							</div>	
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('zip_code', 'Zip Code:')}}
								{{ Form::text('zip_code',old('zip_code') ?? $member->zip_code,['class' => 'form-control zip_code readonly','readonly'=>'true','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('zip_code')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-6 from-group mt-3">
								{{ Form::label('www', 'Website:')}}
								{{ Form::text('www',old('www') ?? $member->www,['class' => 'form-control www readonly','readonly'=>'true'])}}
								@error('www')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							<div class="col-md-12 from-group mt-3">
								{{ Form::label('about', 'About:')}}
								{{ Form::textarea('about',null,['class'=>'form-control readonly','readonly'=>'true', 'rows' => 2, 'cols' => 40,'id'=>'mytextarea']) }}
								@error('about')
	                                <span class="text-danger" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
		                        @enderror
							</div>
							{{ Form::close() }}
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.editBtn').on('click',function(){
			// alert('hello');
			$('.readonly').attr('readonly',false);
			$('.editBtn').hide();
			$('.cancelBtn').show();
			$('.updateBtn').show();
		});
		$('.cancelBtn').on('click',function(){
			$('.readonly').attr('readonly',true);
			$('.editBtn').show();
			$('.cancelBtn').hide();
			$('.updateBtn').hide();
		});
	});
</script>
@endsection
