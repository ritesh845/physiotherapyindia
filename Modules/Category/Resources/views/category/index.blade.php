@extends('dashboard.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Category</h1>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Categories <a href="{{url('category/create')}}" class="btn btn-sm btn-primary pull-right">Add Category</a></h4>
				
			</div>
			<div class="card-body">
				 <table id="tree-table" class="table table-hover table-bordered">
                    <tbody>
                    <th>Categories </th>
                    <tr id="page_list">
                            @foreach($parentCategories as $category)
                                <tr data-id="{{$category->id}}" data-parent="0" data-level="1" >
                                    <td data-column="name" class="{{$category->view_subcat != '0' ? '' : 'text-muted'}}"> {{$category->category_name}} <a href="{{url('/category/'.$category->sefriendly.'/edit')}}" class="btn btn-sm btn-success pull-right ">Edit</a></td>
                                </tr>
                                @if(count($category->subcategory))
                                    @include('category::category.subCategoryView',['subcategories' => $category->subcategory, 'dataParent' => $category->id , 'dataLevel' => 1, 'dataSpace' => 2])
                                @endif      
				            @endforeach
				            </tr>
                        </tbody>
                    
                    </table>
			</div>		

		</div>
		
	</div>
</div>
<script>
	$(function () {
    var
        $table = $('#tree-table'),
        rows = $table.find('tr');

	    rows.each(function (index, row) {
	        var
	            $row = $(row),
	            level = $row.data('level'),
	            id = $row.data('id'),
	            $columnName = $row.find('td[data-column="name"]'),
	            children = $table.find('tr[data-parent="' + id + '"]');

	        if (children.length) {
	            var expander = $columnName.prepend('' +
	                '<span class="treegrid-expander fa fa-chevron-down"></span>' +
	                '');
	             // children.hide();

	            expander.on('click', function (e) {
	                var $target = $(e.target);
	            	console.log($target.prop("className"));
	            	if($target.prop("tagName") == 'SPAN'){
	            		if ($target.hasClass('fa-chevron-right')) {
		                    $target
		                        .removeClass('fa-chevron-right')
		                        .addClass('fa-chevron-down');

		                  
		                    children.show();
		                } else {
		                    $target
		                        .removeClass('fa-chevron-down')
		                        .addClass('fa-chevron-right');
		                    
		                    reverseHide($table, $row);
		                }	
	            	}
	                
	            });
	        }
	        $columnName.prepend('' +
	            '' +
	            '');
	    });

	    // Reverse hide all elements
	    reverseHide = function (table, element) {
	    	
	        var
	            $element = $(element),
	            id = $element.data('id'),
	            children = table.find('tr[data-parent="' + id + '"]');

	        if (children.length) {
	            children.each(function (i, e) {
	                reverseHide(table, e);
	            });

	            // $element
	            //     .find('.fa-chevron-down')
	            //     .removeClass('fa-chevron-down')
	            //     .addClass('fa-chevron-right');

	            children.hide();
	        }
	    };
});
</script>
@endsection