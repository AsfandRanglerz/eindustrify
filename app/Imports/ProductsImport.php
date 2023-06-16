<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Product;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{

    private $vendor;
    private $keyValue;
    private $headerMapping;
    public function __construct($vendor, $keyValue, $headerMapping)
    {
        $this->vendor = $vendor;
        $this->keyValue = $keyValue;
        $this->headerMapping = $headerMapping;
    }

    public function model(array $row)
    {
        $data = [];
        try {
            foreach ($this->headerMapping as $header => $dbField) {
                $data[$dbField] = $row[$header];
                $data['vendor_id'] = $this->vendor;
            }
        } catch (\Exception $e) {

            // $user = User::find($this->vendor);
            // if ($user) {
            //     $user->delete();
            // }
            // session()->put('status', 'failed');
            // dd('usman');
            // Handle the exception here
            // You can log the error, display an error message, or take any other necessary action
            // For example, you can use the following code to log the error:
            // Log::error($e->getMessage());
        }

            return new Product($data);
    }
}
