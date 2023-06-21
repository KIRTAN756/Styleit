<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State_info extends Model
{
    use HasFactory;
    protected $table = "state_infos";
    protected $primaryKey = "State_id";
}
