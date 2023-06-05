<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ChildCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $vendor;

    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    public function model(array $row)
    {
        Validator::make($row, [
            'name' => 'required',
            'short_name' => 'required',
            'slug' => 'required',
        ])->validate();
        $childcategory = ChildCategory::where('name', $row['post_name'])->first();
        return new Product([
            'name' => $row['name'],
            'vendor_id' =>  $this->vendor,
            'short_name' => $row['short_name'],
            'slug' => $row['slug'],
            // Add other fields here if necessary
        ]);
    }
}
