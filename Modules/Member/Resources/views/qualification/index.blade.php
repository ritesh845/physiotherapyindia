@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Qualification</h1>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Qualification <a href="{{url('/qualification/create')}}" class="btn btn-sm btn-primary pull-right">Add Qualification</a></h5>
			</div>
			<div class="card-body">
				@if($message = Session::get('success'))
				    <div class="alert alert-success">
				        {{$message}}
				    </div>
				@endif
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped mytable">
							<thead>
								<tr>
									<th>#</th>
									<th>Qualification Name</th>
									<th>School/College/Institute</th>
									<th>Board/University/Other</th>
									<th>Pass Year (In %)</th>
									<th>Pass Marks</th>
									<th>Pass Division</th>	
									<th>Verify for approval</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$count = 1; 
								@endphp
								@foreach($qualifications as $qualification)
								<tr>
									<td>{{$count}}</td>
									<td>{{$qualification->qual_catg_desc}}</td>
									<td>{{$qualification->location}}</td>
									<td>{{$qualification->board}}</td>
									<td>{{$qualification->pass_year}}</td>
									<td>{{$qualification->pass_marks}}</td>
									<td>{{$qualification->pass_division == '1' ? '1st' : ($qualification->pass_division == '2' ? '2nd' : '3rd')}}</td>

									<td>{{$qualification->status == 'P' ? 'Pending' : ($qualification->pass_division == 'A' ? 'Approved' : 'Declined')}}</td>

									<td>
										<a href="{{url('/qualification/'.$qualification->id.'/edit')}}" class="mr-2"><i class="fa fa-edit text-success"></i></a>

										<a href="{{url('/doc_download/'.$qualification->file->id)}}" class="mr-2"><i class="fa fa-download text-info"></i></a>

										<a href="{{asset('storage/'.$qualification->file->disk.'/'.$qualification->file->file_name)}}" ><i class="fa fa-eye text-info"></i></a>
									</td>
								</tr>
								@php $count++; @endphp
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script >
	$(document).ready(function () {
    	$('.mytable').DataTable();
	});
</script>
@endsection