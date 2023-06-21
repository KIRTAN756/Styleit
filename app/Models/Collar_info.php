<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collar_info extends Model
{
    use HasFactory;
    protected $table = "collar_infos";
    protected $primaryKey = "Collar_id";
}
