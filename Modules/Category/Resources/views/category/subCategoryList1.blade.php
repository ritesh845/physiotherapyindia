@foreach($subcategories as $subcategory)
    @if(count($subcategory->subcategory))
        <li class="dd-item" data-id="{{$subcategory->id}}" data-parent="{{$subcategory->parent_cat}}">
            <div class="dd-handle">{{$subcategory->category_name}}</div>
             <ol id="{{$category->parent_cat}}">
                @include('category::category.subCategoryList1',['subcategories' => $subcategory->subcategory])
            </ol>
        </li>
    @else
        <li class="dd-item" data-id="{{$subcategory->id}}" data-parent="{{$subcategory->parent_cat}}">
            <div class="dd-handle">{{$subcategory->category_name}}</div>
        </li>
    @endif

@endforeach