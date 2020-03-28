@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Articles</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Articles 
					{{link_to('/article/create', $title = 'Add Article', $attributes = ['class' => 'btn btn-sm btn-primary pull-right'], $secure = null)}}
				</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Title</th>
							<th>Action</th>
						</tr>						
					</thead>
					<tbody>
						@foreach($articles as $article)
						<tr>
							<td>{{$article->title}}</td>
							<td>
								<a href="{{url('article/'.$article->id.'/edit')}}"><i class="fa fa-edit text-success"></i></a>
								<a href="{{url('article/destroy/'.$article->id)}}"><i class="fa fa-trash text-danger"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script >
	@if($message = Session::get('success'))
  	  alert('{{$message}}');
	@endif
</script>
@endsection