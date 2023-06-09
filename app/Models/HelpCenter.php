<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'use_industrify',
        'love_feature',
        'improve_first',
        'recommend_endustrify'
    ];
}
