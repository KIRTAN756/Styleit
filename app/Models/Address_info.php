<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address_info extends Model
{
    use HasFactory;
    protected $table = "address_infos";
    protected $primaryKey = "Address_id";
}
