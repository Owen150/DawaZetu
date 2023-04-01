<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'phone_number',
        'status',
        'type',
        'note',
        'subcounty',
        'ward',
        'facility_id',
    ];
}
