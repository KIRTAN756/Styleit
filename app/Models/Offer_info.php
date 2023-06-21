<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_info extends Model
{
    use HasFactory;
    protected $table = "offer_infos";
    protected $primaryKey = "Offer_id";
}
