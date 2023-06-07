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
            'qty' => 'required',
            'price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ])->validate();
        // $childcategory = ChildCategory::where('name', $row['post_name'])->first();
        return new Product([
            'name' => $row['name'],
            'vendor_id' =>  $this->vendor,
            'short_name' => $row['short_name'],
            'slug' => $row['slug'],
            'qty' => $row['qty'],
            'price' => $row['price'],
            'short_description' => $row['short_description'],
            'long_description' => $row['long_description'],
            // Add other fields here if necessary
        ]);
    }
}
