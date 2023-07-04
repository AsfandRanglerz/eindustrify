<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $casts = [
        'status' => 'integer'
    ];
}
