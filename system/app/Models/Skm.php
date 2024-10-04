<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Skm extends Model
{
    use HasFactory;

    protected $table = 'skm';
    protected $primaryKey = 'skm_id';
}
