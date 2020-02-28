@foreach($subcategories as $subcategory)
        <tr data-id="{{$subcategory->id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
            <td data-column="name">{{$subcategory->category_name}} <a href="{{url('/category/'.$subcategory->sefriendly.'/edit')}}" class="btn btn-sm btn-success pull-right ">Edit</a></td>
        </tr>
        @if(count($subcategory->subcategory))
            @include('category::category.subCategoryView',['subcategories' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel +1 ])
        @endif
@endforeach