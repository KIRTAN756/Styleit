<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material_info extends Model
{
    use HasFactory;
    protected $table = "material_infos";
    protected $primaryKey = "Material_id";
}
