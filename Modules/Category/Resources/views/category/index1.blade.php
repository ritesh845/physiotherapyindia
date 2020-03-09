@extends('dashboard.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/nestable.css')}}">
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
                <div class="cf nestable-lists">

                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach($parentCategories as $category)
                                @if(count($category->subcategory))
                                    <li class="dd-item" data-id="{{$category->id}}" data-parent="{{$category->parent_cat}}">
                                       <div class="dd-handle"> {{$category->category_name}} <a href="{{url('category/create')}}" class="pull-right">Edit</a></div>
                                        <ol id="{{$category->parent_cat}}">
                                            @include('category::category.subCategoryList1',['subcategories' => $category->subcategory])
                                        </ol>
                                    </li>
                                @else
                                    <li class="dd-item" data-id="{{$category->id}}" data-parent="{{$category->parent_cat}}">
                                        <div class="dd-handle">{{$category->category_name}}</div>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/nestable.js')}}"></script>

<script>

$(document).ready(function()
{




 $('.dd').nestable().on('change', function() {
     var data = $('.dd').nestable('serialise');

     $.each(data,function(i,v){
        $.each(data,function(j,k){

        });
     })
    // var data = new Array();
    // $('.dd li').each(function() {

    //     data.push({
    //         page_id: $(this).attr("data-id"),
    //         // parent_id:$(this).prev(), 
    //         parent:$(this).parent() 
    //     });
    // });
    //console.log(data);
});

   

});
</script>
@endsection