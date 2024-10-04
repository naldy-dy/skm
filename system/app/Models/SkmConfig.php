<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class SkmConfig extends Model
{
    use HasFactory;

    protected $table = 'skm_config';
    protected $primaryKey = 'skm_config_id';
}
