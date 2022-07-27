<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'catagory_name',
        'product_name',
        'price',
        'image_path'
        
    ];

}
