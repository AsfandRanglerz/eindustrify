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
        return new Role([
            'title' => $row['name'],
        ]);
    }
}
