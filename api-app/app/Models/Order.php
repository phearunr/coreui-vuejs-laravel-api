<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'amount'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id', 'order_id');
    }

    public function scorePoints()
    {
        return $this->hasMany(ScorePoint::class, 'id', 'order_id');
    }
}
