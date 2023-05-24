@if($subCategory != null)
@foreach ($subCategory as $subcategory)
<?php
$vendorCategory = App\Models\VendorCategory::where('category_id', $subcategory->category_id)
    ->where('vendor_id', $id)
    ->first();
if (isset($vendorCategory)) {
    $vendorSubCategory = App\Models\VendorSubCategory::where('sub_category_id', $subcategory->id)
        ->where('category_id', $vendorCategory->category_id)
        ->where('vendor_id', $id)
        ->first();
}
?>
<option value="{{ $subcategory->id }}"
    @if (isset($vendorSubCategory)) @if ($subcategory->id == $vendorSubCategory->sub_category_id) selected @endif
    @endif>{{ $subcategory->name }}
</option>
@endforeach
@endif
