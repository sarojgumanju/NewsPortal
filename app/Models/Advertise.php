<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $casts = [
        "expire_date" => 'date'
    ];
}
