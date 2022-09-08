<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HksMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'district',
        'month',
        'year',
        'created_by',
        'updated_by',
    ];
}
