@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Articles</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Add Articles 
					{{link_to('/article', $title = 'Back', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}
				</h5>
			</div>
			<div class="card-body">	
				
			</div>
		</div>
	</div>
</div>
@endsection