<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tailor_info extends Model
{
    use HasFactory;
    protected $table = "tailor_infos";
    protected $primaryKey = "Tailor_id";
}
