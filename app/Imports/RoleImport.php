<?php
namespace App\Imports;

use App\Models\Role;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'short_name' => $row['short_name'],
            'slug' => $row['slug'],
        ]);
    }
}
