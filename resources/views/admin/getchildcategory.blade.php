@if($childCategory != null)
@foreach ($childCategory as $childcategory)
<?php
$vendorCategory = App\Models\VendorCategory::where('category_id', $childcategory->category_id)
    ->where('vendor_id', $id)
    ->first();
if (isset($vendorCategory)) {
    $vendorSubCategory = App\Models\VendorSubCategory::where('sub_category_id', $childcategory->sub_category_id)
        ->where('category_id', $vendorCategory->category_id)
        ->where('vendor_id', $id)
        ->first();
}
if (isset($vendorSubCategory)) {
    $vendorChildCategory = App\Models\VendorChildCategory::where('sub_category_id', $childcategory->sub_category_id)
        ->where('category_id', $vendorSubCategory->category_id)
        ->where('child_category_id', $childcategory->    id)
        ->where('vendor_id', $id)
        ->first();
}
?>

<option value="{{ $childcategory->id }}" @if (isset($vendorChildCategory)) @if ($childcategory->id == $vendorChildCategory->child_category_id) selected @endif
    @endif>{{ $childcategory->name }}
</option>
@endforeach
@endif
