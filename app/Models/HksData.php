<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HksData extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcf_id',
        'lsg_id',
        'q1',
        'q2',
        'q3',
        'q4',
    ];
}
