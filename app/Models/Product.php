<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_name',
        'manufacturers', 
        'strength', 
        'unit_of_measure', 
        'package_size', 
        'package_quantity', 
        'no_of_items_in_box',
    ];
}
