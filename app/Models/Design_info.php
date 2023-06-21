<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design_info extends Model
{
    use HasFactory;
    protected $table = "design_infos";
    protected $primaryKey = "Design_id";
}
