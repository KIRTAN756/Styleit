<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_info extends Model
{
    use HasFactory;
    protected $table = "city_infos";
    protected $primaryKey = "City_id";
}
