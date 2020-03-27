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
				<table>
					<thead>
						<tr>
							<th></th>
							<th></th>
						</tr>						
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection