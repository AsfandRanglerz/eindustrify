<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{

    private $vendor;
    private $keyValue;
    private $headerMapping;
    public function __construct($vendor, $keyValue,$headerMapping)
    {
        $this->vendor = $vendor;
        $this->keyValue = $keyValue;
        $this->headerMapping = $headerMapping;
        
    }

    public function model(array $row)
    {
        $data = [];
        foreach ($this->headerMapping as $header => $dbField) {
            $data[$dbField] = $row[$header];
            $data['vendor_id'] = $this->vendor;
        }

        return new Product($data);

    }
}
