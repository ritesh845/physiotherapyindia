@foreach($subcategories as $subcategory)
	<option value="{{$subcategory->id}}" {{old('parent_cat') == $subcategory->id ? 'selected' : ''}} {{!empty($categoryInfo) ? ($categoryInfo->parent_cat == $subcategory->id ? 'selected' : '') : ''}}>&nbsp;&nbsp;-&nbsp;{{$subcategory->category_name}}</option>
	@if(count($subcategory->subcategory))
		@include('category::category.subCategoryList',['subcategories' => $subcategory->subcategory])
	@endif										
@endforeach