<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSupport extends Model
{
    use HasFactory;
    protected $fillable = [
        'localted_usa',
        'subject',
        'bussiness_name',
        'email',
        'first_name',
        'last_name',
        'phone',
        'message'
    ];
}
