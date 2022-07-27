<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'roll',
        'class',
        'name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'contuct_number',
        'image'

        
    ];
}
