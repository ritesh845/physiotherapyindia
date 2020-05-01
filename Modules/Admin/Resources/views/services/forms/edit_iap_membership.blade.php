@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Services</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">{{$service->name}}
					{{link_to('/service/'.$service->id, $title = 'Back', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}			
				</h5>	
			</div>
			<div class="card-body">
				{{Form::open(array('url' => '/service/iap_membership/update','method' => 'POST','enctype' => 'multipart/form-data'))}}
					@method('Patch')
					<div class="row mt-3">
						<div class="col-md-6 form-group">
							@if($service->id == '10' || $service->id == '12') 
								{{Form::label('college_code','Select IAP Member College Name',['class' => 'required'])}}
								{{Form::select('college_code',$colleges,'',['class' => 'form-control college_code select2'])}}
								@error('college_code')
			                        <span class="text-danger" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							@else
								{{Form::label('college_name','College Name',['class' => 'required'])}}
								{{Form::text('college_name',old('college_name'),['class' => 'form-control college_name'])}}
								@error('college_name')
			                        <span class="text-danger" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
							@endif
						</div>
						<div class="col-md-12 form-group">
							<h6>Fees : <i class="fa fa-rupee"></i> {{$service->charges}}</h6>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 form-group">
							<h5 class="text-muted">Application Deatils</h5>
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('first_name','First Name',['class' => 'required'])}}
							{{Form::text('first_name',old('first_name'),['class' => 'form-control'])}}
							@error('first_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('middle_name','Middle Name')}}
							{{Form::text('middle_name',old('middle_name'),['class' => 'form-control'])}}
							@error('middle_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('last_name','Last Name',['class' => 'required'])}}
							{{Form::text('last_name',old('last_name'),['class' => 'form-control'])}}
							@error('last_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('mobile','Mobile Number')}}
							{{Form::text('mobile',old('mobile') ?? Auth::user()->phone,['class' => 'form-control','readonly' => 'true'])}}
							@error('mobile')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('mobile1','Alternate Mobile Number')}}
							{{Form::text('mobile1',old('mobile1'),['class' => 'form-control','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
							@error('mobile1')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('email','Email Address')}}
							{{Form::email('email',old('email') ?? Auth::user()->email,['class' => 'form-control','readonly' => 'true'])}}
							@error('email')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('email1','Alternate Email Address')}}
							{{Form::email('email1',old('email1'),['class' => 'form-control'])}}
							@error('email1')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('blood_group','Blood Group')}}
							{{Form::select('blood_group',array('' => 'Select Blood Group','A+' => 'A+','O+' => 'O+','B+' => 'B+','AB+' => 'AB+','A-' => 'A-','O-'=>'O-','B-'=> 'B-','AB-' => 'AB-'),'',['class' => 'form-control blood_group'])}}
							@error('blood_group')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{ Form::label('gender', 'Gender:',['class' => 'required'])}}
							{{ Form::select('gender',array('' => 'Select Gender','M' => 'Male','F'=>'Female', 'o' => 'Other'), old('gender'),['class'=>'form-control gender'])}}
							@error('gender')
						        <span class="text-danger" role="alert">
						            <strong>{{ $message }}</strong>
						        </span>
						    @enderror	
						</div>
						<div class="col-md-4 form-group">
							{{ Form::label('dob', 'Date of Birth:',['class' => 'required'])}}
							{{ Form::text('dob',old('dob'),['class' => 'form-control datepicker dob'])}}
							@error('dob')
						        <span class="text-danger" role="alert">
						            <strong>{{ $message }}</strong>
						        </span>
						    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{ Form::label('place_of_birth', 'Place of Birth:')}}
							{{ Form::text('place_of_birth',old('place_of_birth'),['class' => 'form-control place_of_birth'])}}
							@error('place_of_birth')
						        <span class="text-danger" role="alert">
						            <strong>{{ $message }}</strong>
						        </span>
						    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{ Form::label('country_of_birth', 'Country Name:')}}
							{{ Form::select('country_of_birth',$countries, '',['class'=>'form-control country_of_birth'])}}	
							@error('country_of_birth')
								<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror	
						</div>
						<div  class="col-md-12 form-group">
							<p class="text-muted">
								Applicant Father/ Mother/ Husband/Guardian.
							</p>
						</div>
						<div class="col-md-12 form-group">
							{{Form::label('relation_type','Relation Type')}}
							{{Form::select('relation_type',array('' => 'Select Relation','F' => 'Father','M' => 'Mother','H' => 'Husband','G' => 'Guardian'),'',['class' => 'form-control relation_type'])}}
							@error('relation_type')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('rel_f_name','First Name')}}
							{{Form::text('rel_f_name',old('rel_f_name'),['class' => 'form-control'])}}
							@error('rel_f_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('rel_m_name','Middle Name')}}
							{{Form::text('rel_m_name',old('rel_m_name'),['class' => 'form-control'])}}
							@error('rel_m_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-4 form-group">
							{{Form::label('rel_l_name','Last Name')}}
							{{Form::text('rel_l_name',old('rel_l_name'),['class' => 'form-control'])}}
							@error('rel_l_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>

						<div class="col-md-6 form-group">
							{{Form::label('qualification_type','Education Qualification Type')}}
							{{Form::select('qualification_type',array('' => 'Select Qualification Name','10th' => '10th', '12th' => '12th','btp' => 'B.P.T.', 'mpt' => 'M.P.T.'),'',['class' => 'form-control'])}}
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('qualification_name','College/School Name')}}
							{{Form::text('qualification_name',old('qualification_name'),['class' => 'form-control'])}}
							@error('qualification_name')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('qualification_university','University/Board Name')}}
							{{Form::text('qualification_university',old('qualification_university'),['class' => 'form-control'])}}
							@error('qualification_university')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('qualification_year_pass','Year of Passing')}}
							{{Form::text('qualification_year_pass',old('qualification_year_pass'),['class' => 'form-control'])}}
							@error('qualification_year_pass')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>

						<div class="col-md-12 from-group  mt-3">
						<div class="card">
							<div class="card-header p-2">
								<h5>Permanent Address:</h5>
							</div>
							<div class="card-body">	
								<div class="row">
									<div class="col-md-4 from-group">
										{{Form::label('p_address','Address Line',['class' => 'required'])}}
										{{Form::text('p_address',old('p_address'),['class'=>'form-control p_address','id' => 'address'])}}
										@error('p_address')
			                                <span class="text-danger" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
				                        @enderror
									</div>
									<div class="col-md-4 from-group">
										{{ Form::label('p_country', 'Country Name:',['class' => 'required'])}}
										{{ Form::select('p_country',$countries, old('p_country'),['class'=>'form-control p_country','id'=>'country'])}}	
										@error('p_country')
											<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror		
									</div>
									<div class="col-md-4 from-group">
										{{ Form::label('p_state', 'State Name:',['class' => 'required'])}}
										{{ Form::select('p_state',array(),'',['class'=>'form-control p_state','id' => 'state'])}}
										@error('p_state')
									        <span class="text-danger" role="alert">
									            <strong>{{ $message }}</strong>
									        </span>
									    @enderror	
									</div>
									<div class="col-md-4 from-group mt-2">
										{{ Form::label('p_city', 'City Name:',['class' => 'required'])}}
										{{ Form::select('p_city',array(),'',['class'=>'form-control p_city','id'=>'city'])}}
										@error('p_city')
									        <span class="text-danger" role="alert">
									            <strong>{{ $message }}</strong>
									        </span>
									    @enderror	
									</div>
									<div class="col-md-4 from-group mt-2">
										{{ Form::label('p_zip_code', 'Zip Code:',['class' => 'required'])}}
										{{ Form::text('p_zip_code',old('p_zip_code'),['class' => 'form-control zip_code','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'id' => 'zip_code'])}}
										@error('p_zip_code')
										<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						</div>

						<div class="col-md-12 from-group  mt-3">
							<div class="card">
								<div class="card-header p-2">
									<h5>Correspondence Address:</h5>
								</div>
								<div class="card-body">	
								<div class="row">
									<div class="col-md-12">
										{{Form::checkbox('same_as1',null,old('same_as') != 0 ? true : null,['id'=>'addr_check'])}}
										{{ Form::hidden('same_as',old('same_as') != 0 ? '1' : '0',['id' => 'same_as']) }}
										{{Form::label('same_as','Same as Permanent Address(Click to copy permanent address data)')}}
									</div>
									<div class="col-md-4 from-group">
										{{Form::label('c_address','Address Line',['class' => 'required'])}}
										{{Form::text('c_address',old('c_address'),['class'=>'form-control','id' => 'address1'])}}
										@error('c_address')
			                                <span class="text-danger" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
				                        @enderror
									</div>
									<div class="col-md-4 from-group">
										{{ Form::label('c_country', 'Country Name:',['class' => 'required'])}}
										{{ Form::select('c_country',$countries, old('c_country'),['class'=>'form-control c_country','id'=>'country1'])}}	
										@error('c_country')
											<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
											</span>
										@enderror		
									</div>
									<div class="col-md-4 from-group">
										{{ Form::label('c_state', 'State Name:',['class' => 'required'])}}
										{{ Form::select('c_state',array(), '',['class'=>'form-control c_state','id'=>'state1'])}}
										@error('c_state')
									        <span class="text-danger" role="alert">
									            <strong>{{ $message }}</strong>
									        </span>
									    @enderror	
									</div>
									<div class="col-md-4 from-group mt-2">
										{{ Form::label('c_city', 'City Name:',['class' => 'required'])}}
										{{ Form::select('c_city',array(), '',['class'=>'form-control c_city','id'=>'city1'])}}
										@error('c_city')
									        <span class="text-danger" role="alert">
									            <strong>{{ $message }}</strong>
									        </span>
									    @enderror	
									</div>
									<div class="col-md-4 from-group mt-2">
										{{ Form::label('c_zip_code', 'Zip Code:',['class' => 'required'])}}
										{{ Form::text('c_zip_code',old('c_zip_code'),['class' => 'form-control c_zip_code','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'id' => 'zip_code1'])}}
										@error('c_zip_code')
											<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								</div>
							</div>
						</div>
						<div  class="col-md-12 form-group">
							<p class="text-muted">
								Documents  to be Attach by Applicant
							</p>
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('address_proof_type','Address Proof')}}
							{{Form::select('address_proof_type',array('' => 'Select Address Proof','1' => 'Aadhaar Card','2' => 'Voter ID Card','3' => 'Driving Licenese','4' => 'Pan Card'),'',['class' => 'form-control address_proof_type'])}}
							@error('address_proof_type')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						<div class="col-md-6 form-group">
							{{Form::label('address_proof_doc','Address Proof Document')}}
							{{ Form::file('address_proof_doc',['class' => 'form-control'])}}
							@error('address_proof_doc')
		                        <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th>Dcoument Type</th>
										<th>Document Upload</th>		
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>{{__('Applicant Signature')}}</th>
										<th>{{ Form::file('signature',['class' => 'form-control','accept'=>"image/*"])}}
											@error('signature')
						                        <span class="text-danger" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror
										</th>

									</tr>
									<tr>
										<th>{{__('Applicant Photo')}}</th>
										<th>{{ Form::file('photo',['class' => 'form-control','accept'=>"image/*"])}}
										@error('photo')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('10th Marksheet')}}</th>
										<th>
										{{ Form::file('10th_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('10th_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('12th Marksheet')}}</th>
										<th>
										{{ Form::file('12th_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('12th_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Internship Certificate')}}</th>
										<th>
										{{ Form::file('internship_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('internship_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Bachelor of Physiotherapy (B.P.T.)')}}</th>
										<th>
										{{ Form::file('bpt_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('bpt_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Master of Physiotherapy (M.P.T.)')}}</th>
										<th>
										{{ Form::file('mpt_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('mpt_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Any Goverment Proof')}}</th>
										<th>
										{{ Form::file('gov_proof',['class' => 'form-control','accept'=>"image/*"])}}
										@error('gov_proof')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Any Goverment Proof')}}</th>
										<th>
										{{ Form::file('gov_proof1',['class' => 'form-control','accept'=>"image/*"])}}
										@error('gov_proof1')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
									<tr>
										<th>{{__('Any Other Document')}}</th>
										<th>
										{{ Form::file('any_other_doc',['class' => 'form-control','accept'=>"image/*"])}}
										@error('any_other_doc')
					                        <span class="text-danger" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                    @enderror
										</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<div class="card-footer">
					{{Form::hidden('service_id',$service->id)}}
					{{Form::submit('Save & Continue',['class' => 'btn btn-sm btn-secondary'])}}		
				</div>
				{{Form::close()}}
		</div>
	</div>
</div>
<script >
	$(document).ready(function(){
		$('.select2').select2();
		
		$('.required').append('<span class="text-danger">*</span>');

		$(function() {
			$('.dob').datepicker({
				format:'yyyy-mm-dd'
			});
		});

		var state_id = 'state';
		var state_id1 = 'state1';
		var city_id = 'city';
		var city_id1 = 'city1';


		var country_code = "{{old('p_country') !='' ? old('p_country') : ''}}";
		
		var country_code1 = "{{old('c_country') !='' ? old('c_country') : ''}}";
		var state_code = "{{old('p_state') !=null ? old('p_state') : ''}}";
		var city_code = "{{old('p_city') !=null ? old('p_city') : '' }}";		
		var state_code1 = "{{old('c_state') !=null ? old('c_state') : ''}}";
		var city_code1 = "{{old('c_city') !=null ? old('c_city') : '' }}";

		if(country_code !='' ){
			console.log('Asdasd')
			states(country_code,state_id,state_code);
			cities(state_code,city_id,city_code1);
		}
		if(country_code1 !=''){
			
			states(country_code1,state_id1,state_code1);
			cities(state_code1,city_id1,city_code1);
		}



		$('#country, #country1').on('change',function(e){	
			e.preventDefault();
			var country_id = $(this).attr('id');
			// console.log(country_id);
			var country_code = $(this).val();
			if(country_id == 'country'){
				states(country_code,state_id);
			}else{
				states(country_code,state_id1);			
			}
		});
		$('#state, #state1').on('change',function(e){
			e.preventDefault();
			var state = $(this).attr('id');
			var state_code = $(this).val();	

			if(state == 'state'){
				cities(state_code,city_id);
			}else{
				cities(state_code,city_id1);
			}

		});


		$('#addr_check').on('change',function(){
			var check = $("[name='same_as1']:checked").val();
			console.log(check);
			if(check == 'on'){
				$('#same_as').val('1');
				var address = $('#address').val();
				var zip_code = $('#zip_code').val();
				var country_code = $('#country').val();
				var state_code = $('#state').val();
				var city_code = $('#city').val();


				$('#country1').val(country_code);
				states(country_code,state_id1,state_code);
				cities(state_code,city_id1,city_code);

				$('#address1').val(address);
				$('#zip_code1').val(zip_code);
			
			}else{
				$('#same_as').val('0');
				$('#address1').val('');
				$('#zip_code1').val('');

				var country_code = '';
				var state_code = '';

				states(country_code,state_id1,state_code);
				cities(state_code,city_id1,city_code);				
			}
		});

	})

</script>
@endsection
