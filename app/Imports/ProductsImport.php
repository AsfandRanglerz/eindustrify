<?php

namespace App\Imports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function model(array $row)
    {
        return new Role([
            'title' => $row['name'],
            // Add other fields here if necessary
        ]);
    }
}
