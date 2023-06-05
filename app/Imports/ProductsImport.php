<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'short_name' => $row['short_name'],
            'slug' => $row['slug'],
            // Add other fields here if necessary
        ]);
    }
}
