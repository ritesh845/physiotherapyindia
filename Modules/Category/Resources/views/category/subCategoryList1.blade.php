@foreach($subcategories as $subcategory)
    @if(count($subcategory->subcategory))
        <li class="dd-item" data-id="{{$subcategory->id}}">
            <div class="dd-handle">{{$subcategory->category_name}}</div>
            <ol id="{{$subcategory->id}}">
                @include('category::category.subCategoryList1',['subcategories' => $subcategory->subcategory])
            </ol>
        </li>
    @else
        <li class="dd-item" data-id="{{$subcategory->id}}">
            <div class="dd-handle">{{$subcategory->category_name}}</div>
        </li>
    @endif

@endforeach