<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurment_info extends Model
{
    use HasFactory;
    protected $table = "measurment_infos";
    protected $primaryKey = "Measurment_id";
}
