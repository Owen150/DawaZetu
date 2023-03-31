<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'facility_id',
        'status',
        'type',
        'note',
    ];
}
