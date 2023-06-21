<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern_info extends Model
{
    use HasFactory;
    protected $table = "pattern_infos";
    protected $primaryKey = "Pattern_id";
}
