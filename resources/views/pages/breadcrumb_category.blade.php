
@if($parentcategory->parentcategory !=null)
	
	@include('pages.breadcrumb_category',['parentcategory' => $parentcategory->parentcategory])

	<li class="breadcrumb-item"><a href="#">{{$parentcategory->parentcategory->category_name}}</a></li>
	
@endif