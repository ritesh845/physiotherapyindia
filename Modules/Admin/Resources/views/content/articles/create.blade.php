@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Articles</h1>
</div>
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs">
				    <li class="nav-item">
				      <a class="nav-link active" data-toggle="tab" href="#add_article">Add New Article</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#image_gallery">Image Gallery</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#directory">Directory</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#attachemets">Attachements</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#google_settings">Google News Settings</a>
				    </li>
				</ul>
			</div>
			{{Form::open(array('url' => '', 'method' => 'post','enctype' => 'multipart/form-data'))}}
			<div class="card-body">	
				<div class="tab-content">
				    <div id="add_article" class="container tab-pane active">
				    	<div class="row form-group">
				    		<div class="col-md-12 mb-2">
				    			{{ Form::label('title', 'Title:')}}
								{{ Form::text('title',old('title'),['class' => 'form-control title'])}}	
				    		</div>
				    		<div class="col-md-12 mb-2">
				    			{{Form::label('abstract','Abstact')}}
				    			{{Form::textarea('abstract',old('abstract'),['class' => 'form-control abstract' , 'rows' => '4' , 'cols' => '4' ])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('abstract_image','Abstact Image')}}
				    			{{Form::file('abstract_image',['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('image_caption','Image Caption')}}
				    			{{Form::text('image_caption',old('image_caption'),['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('source','Source')}}
				    			{{Form::text('source',old('source'),['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('source_url','Source Url')}}
				    			{{Form::text('source_url',old('source_url'),['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('swl_file','Swl File')}}
				    			{{Form::file('swl_file',['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('slider_image','Slider Image')}}
				    			{{Form::file('slider_image',['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-6 mb-2">
				    			{{Form::label('video_attachment','Video')}}
				    			{{Form::file('video_attachment',['class' => 'form-control'])}}
				    		</div>
				    		<div class="col-md-12 mb-2">
				    			{{Form::label('description','Description')}}
				    			{{Form::textarea('description',old('description'),['class' => 'form-control description' , 'rows' => '4' , 'cols' => '4','id'=>'mytextarea'])}}
				    		</div>
				    		<div class="col-md-12 mb-2">
				    			{{Form::label('tag_id','Tags')}}
				    			{{Form::select('tag_id',$tags->pluck('name','id'),'',['class' => 'form-control','id' => 'tags','multiple' => 'multiple'])}}
				    		</div>
				    	</div>
				    </div>
				    <div id="image_gallery" class="container tab-pane fade">
				     image_gallery
				    </div>
				    <div id="directory" class="container tab-pane fade">
				      directory
				    </div>
				    <div id="attachemets" class="container tab-pane fade">
				      attachemets
				    </div>
				    <div id="google_settings" class="container tab-pane fade">
				      google_settings
				    </div>
				    

				</div>



				<div class="card">
					<div class="card-header p-1">
						<ul class="nav nav-tabs" >
						    <li class="nav-item">
						      <a class="nav-link active" data-toggle="tab" href="#options">Options</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#se_friendly">SE Friendly</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#revisions">Revisions</a>
						    </li>
						</ul>
					</div>

					<div class="card-body">	
						<div class="row">
							<div class="col-md-6">						
								<div class="from-group row mb-4">
									{{ Form::label('status', 'Set Status:',['class'=>'control-label col-md-4 text-right'])}}
									<div class="col-md-8 ">
										{{  Form::select('status',array('A' => 'Active', 'P' => 'Pending', 'T' =>'Archived'), old('status'),['class'=>'form-control status'])}}
									</div>
								</div>
								<div class="from-group row mb-4">
									{{ Form::label('parent_cat', 'Parent Category:',['class'=>'control-label col-md-4 text-right'])}}
									<div class="col-md-8 ">
										<select class="form-control" name="parent_cat">
											@foreach($parentCategories as $category)
											<option class="root" value="{{$category->id}}" {{old('parent_cat') == $category->id ? 'selected' : ''}} >{{$category->category_name}}</option>
												@if(count($category->subcategory))
													@include('category::category.subCategoryList',['subcategories' => $category->subcategory, 'dataSpace' => 2])
												@endif
											@endforeach

										</select>
										@error('parent_cat')
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
										{{ Form::label('article_num', 'Number of articles:',['class'=>'control-label col-md-4 text-right'])}}
										<div class="col-md-8 ">
											{{ Form::text('article_num',old('article_num'),['class' => 'form-control'])}}
											@error('article_num')
				                                <span class="text-danger" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror	
										</div>
									</div>
								</div>	
							</div>							
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				{{Form::submit('Save & Continue')}}
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
	    $('#tags').select2();
	    $('.advance').on('click',function(){
			$('.arrow').toggleClass("fa-arrow-up fa-arrow-down");
			$('.advanced_form').toggle();
		});
   	});
</script>
@endsection