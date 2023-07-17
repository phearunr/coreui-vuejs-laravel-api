<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScorePoint extends Model
{
    use HasFactory;
    protected $table = 'score_points';
    protected $fillable = [
        'customer_id',
        'order_id',
        'points',
        'amount'
    ];
}
